<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\PendingRequest;
use Throwable;

class GeminiChatController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:2000',
        ]);
        $apiKey = config('services.gemini.key');
        $model = config(
            'services.gemini.model',
            'gemini-3.5-flash-lite'
        );
        if (empty($apiKey)) {
            return response()->json([
                'error' => 'API key Gemini belum dikonfigurasi.'
            ], 500);
        }
        $systemPrompt = "
            Kamu adalah Anima, asisten AI
            dalam aplikasi CeritaKita.

            Gunakan bahasa Indonesia yang
            hangat, natural, dan mudah dipahami.

            Dengarkan cerita pengguna dengan empati.
            Jangan menghakimi atau meremehkan perasaan.

            Kamu bukan psikolog atau tenaga medis.
            Jangan memberikan diagnosis.

            Jika ada indikasi bahaya atau krisis,
            prioritaskan keselamatan dan anjurkan
            bantuan dari orang tepercaya atau
            layanan profesional yang sesuai.

            Berikan respons yang jelas, relevan,
            dan tidak panjang.

            Usahakan menyelesaikan setiap kalimat
            dan jangan mengakhiri jawaban
            di tengah kalimat.
        ";
        try {
            $response = Http::timeout(40)
                ->connectTimeout(10)
                ->withHeaders([
                    'x-goog-api-key' => $apiKey,
                ])
                ->retry(
                    3,
                    function (int $attempts, \Exception $exception) {
                        return 1000 * (2 ** ($attempts - 1));
                    },
                    function (
                        Throwable $exception,
                        PendingRequest $request
                    ) {
                        return $exception instanceof RequestException
                            && $exception->response->status() === 503;
                    },
                    throw: false
                )
                ->post(
                    "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent",
                    [
                        'systemInstruction' => [
                            'parts' => [
                                [
                                    'text' => $systemPrompt
                                ]
                            ]
                        ],
                        'contents' => [
                            [
                                'role' => 'user',
                                'parts' => [
                                    [
                                        'text' => $validated['message']
                                    ]
                                ]
                            ]
                        ]
                    ]
                );
            if ($response->failed()) {
                Log::warning('Gemini API gagal', [
                    'status' => $response->status(),
                ]);
                if ($response->status() === 429) {
                    return response()->json([
                        'error' =>
                            'Batas penggunaan Anima tercapai. Coba lagi nanti.'
                    ], 429);
                }
                if ($response->status() === 503) {
                    return response()->json([
                        'error' => 'Anima sedang sibuk. Silakan coba beberapa saat lagi.'
                    ], 503);
                }
                return response()->json([
                    'error' =>
                        'Gemini belum dapat memproses permintaan.',
                    'status' => $response->status(),
                    'detail' => config('app.debug')
                        ? $response->json('error.message')
                        : null,
                ], 502);
            }
            $body = $response->json();
            $finishReason = data_get(
                $body,
                'candidates.0.finishReason'
            );
            $parts = data_get(
                $body,
                'candidates.0.content.parts',
                []
            );
            $reply = collect($parts)
                ->filter(function ($part) {
                    return isset($part['text'])
                        && empty($part['thought']);
                })
                ->pluck('text')
                ->implode('');
            Log::info('Gemini response metadata', [
                'finish_reason' => $finishReason,
                'output_tokens' => data_get(
                    $body,
                    'usageMetadata.candidatesTokenCount'
                ),
                'total_tokens' => data_get(
                    $body,
                    'usageMetadata.totalTokenCount'
                ),
                'response_length' => mb_strlen($reply),
            ]);
            if ($finishReason === 'MAX_TOKENS') {
                Log::warning(
                    'Jawaban Gemini mencapai batas token.',
                    [
                        'finish_reason' => $finishReason,
                        'response_length' => mb_strlen($reply),
                    ]
                );
            }
            if (trim($reply) === '') {
                return response()->json([
                    'error' =>
                        'Gemini tidak menghasilkan balasan teks.'
                ], 502);
            }
            return response()->json([
                'success' => true,
                'reply' => $reply,
                'finish_reason' => $finishReason,
            ]);
        } catch (ConnectionException $e) {
            Log::warning('Koneksi Gemini gagal.');
            return response()->json([
                'error' =>
                    'Koneksi ke Gemini gagal atau terlalu lama.'
            ], 503);
        }
    }
}