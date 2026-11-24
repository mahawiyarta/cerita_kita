@extends('layouts.app')

@section('title', 'Pilih Mode Cerita - Cerita Kita')

@push('styles')
    @vite('resources/css/pages/chat-option.css')
@endpush

@section('content')

<section class="chat-option-page">
    <div class="chat-option-container">
        <header class="chat-option-header">
            <h1>Pilih Mode Cerita</h1>
        </header>
        <main class="chat-option-content">
            <div class="chat-option-heading">
                <h2 class="chat-option-title">
                    Bagaimana perasaanmu hari ini?
                </h2>
                <p class="chat-option-description">
                    Pilih cara AI CeritaKita menemanimu
                    menyelesaikan apa yang ada di pikiran.
                </p>
            </div>
            <div class="chat-mode-list">
                <article class="chat-mode-card vent">
                    <div class="chat-mode-icons">
                        <div class="chat-mode-primary-icon">
                            <img
                                src="{{ asset('icons/love.svg') }}"
                                alt=""
                            >
                        </div>
                        <img
                            src="{{ asset('icons/vent.svg') }}"
                            alt=""
                            class="chat-mode-decoration"
                        >
                    </div>
                    <h3 class="chat-mode-name">
                        Mode Vent (Curhat)
                    </h3>
                    <p class="chat-mode-text">
                        AI hanya akan mendengarkan,
                        menemani, dan memvalidasi emosimu
                        tanpa menghakimi atau menggurui.
                        Cocok saat kamu hanya butuh didengar.
                    </p>
                    <a
                        href="{{ route('chat-interface') }}"
                        class="chat-mode-button"
                    >
                        <span>Mulai Curhat</span>
                        <img
                            src="{{ asset('icons/arrow_next.svg') }}"
                            alt=""
                        >
                    </a>
                </article>
                <article class="chat-mode-card advice">
                    <div class="chat-mode-icons">
                        <div class="chat-mode-primary-icon">
                            <img
                                src="{{ asset('icons/psikolog2.svg') }}"
                                alt=""
                            >
                        </div>
                        <img
                            src="{{ asset('icons/advice.svg') }}"
                            alt=""
                            class="chat-mode-decoration"
                        >
                    </div>
                    <h3 class="chat-mode-name">
                        Mode Advice (Solusi)
                    </h3>
                    <p class="chat-mode-text">
                        AI akan bertindak sebagai teman
                        diskusi untuk membedah masalahmu
                        dan mencari jalan keluar konkret.
                        Cocok saat kamu butuh perspektif baru.
                    </p>
                    <a
                        href="{{ route('chat-interface') }}"
                        class="chat-mode-button"
                    >
                        <span>Cari Solusi</span>
                        <img
                            src="{{ asset('icons/arrow_next.svg') }}"
                            alt=""
                        >
                    </a>
                </article>
            </div>
        </main>
        <nav
            class="chat-option-bottom-nav"
            aria-label="Navigasi utama"
        >
            <a
                href="{{ route('home') }}"
                class="chat-option-nav-item"
            >
                <img
                    src="{{ asset('icons/home.svg') }}"
                    alt=""
                >
                <span>Home</span>
            </a>
            <a
                href="{{ route('psikolog') }}"
                class="chat-option-nav-item"
            >
                <img
                    src="{{ asset('icons/psikolog.svg') }}"
                    alt=""
                >
                <span>Psikolog</span>
            </a>
            <a
                href="{{ route('chat-option') }}"
                class="chat-option-nav-item active"
                aria-current="page"
            >
                <img
                    src="{{ asset('icons/chat.svg') }}"
                    alt=""
                >
                <span>Chat</span>
            </a>
            <a
                href="{{ route('journal') }}"
                class="chat-option-nav-item"
            >
                <img
                    src="{{ asset('icons/journal.svg') }}"
                    alt=""
                >
                <span>Journal</span>
            </a>
            <a
                href="{{ route('profile') }}"
                class="chat-option-nav-item"
            >
                <img
                    src="{{ asset('icons/profile.svg') }}"
                    alt=""
                >
                <span>Profile</span>
            </a>
        </nav>
    </div>
</section>

@endsection