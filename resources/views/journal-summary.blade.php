@extends('layouts.app')

@section('title', 'Refleksi Hari Ini - Cerita Kita')

@push('styles')
    @vite('resources/css/pages/journal-summary.css')
@endpush

@section('content')

<section class="journal-summary-page">
    <div class="journal-summary-container">
        <header class="journal-summary-header">
            <a
                href="{{ route('journal') }}"
                class="journal-summary-back"
                aria-label="Kembali ke jurnal"
            >
                <img
                    src="{{ asset('icons/arrow_back.svg') }}"
                    alt=""
                >
            </a>
            <h1>Refleksi Hari Ini</h1>
        </header>
        <main class="journal-summary-content">
            <div class="journal-summary-illustration">
                <img
                    src="{{ asset('images/summary.png') }}"
                    alt="Ilustrasi ringkasan jurnal"
                >
            </div>
            <div class="journal-summary-card">
                <p>
                    Kamu sering merasa kesulitan mengelola
                    tekanan akademik dan cenderung menunda
                    tugas ketika merasa kesulitan.
                </p>
                <p>
                    Mood dominan: <strong>Cemas</strong>
                </p>
                <p>
                    Dari entri jurnal terakhir.
                </p>
            </div>
            <div class="journal-summary-actions">
                <button
                    type="button"
                    class="journal-summary-button"
                >
                    Decision &amp; Crisis Support
                </button>
                <a
                    href="{{ route('chat-option') }}"
                    class="journal-summary-button"
                >
                    Chat Dengan AI
                </a>
            </div>
        </main>
    </div>
</section>

@endsection