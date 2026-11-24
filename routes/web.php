<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiChatController;
Route::view('/', 'intro')->name('intro');
Route::view('/login', 'login')->name('login');
Route::view('/home', 'home')->name('home');
Route::view('/breathing-space', 'breathing-space')->name('breathing-space');
Route::view('/music', 'music')->name('music');
Route::view('/after-breathing', 'after-breathing')->name('after-breathing');
Route::view('/chat-option', 'chat-option')->name('chat-option');
Route::view('/chat-interface', 'chat-interface')->name('chat-interface');
Route::view('/journal', 'journal')->name('journal');

Route::post(
    '/chat/curhat/send',
    [GeminiChatController::class, 'send']
)
    ->middleware('throttle:10,1')
    ->name('chat.send');