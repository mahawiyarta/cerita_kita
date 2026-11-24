@extends('layouts.app')

@section('title', 'Profil Saya - CeritaKita')

@push('styles')
    @vite('resources/css/pages/profile.css')
@endpush

@section('content')

<section class="profile-page">
    <div class="profile-container">
        <header class="profile-header">
            <h1>Profil Saya</h1>
        </header>
        <main class="profile-content">
            <section class="profile-card">
                <img
                    src="{{ asset('icons/decoration.svg') }}"
                    alt=""
                    class="profile-decoration"
                >
                <div class="profile-card-inner">
                    <div class="profile-avatar">
                        <img
                            src="{{ asset('icons/picture.svg') }}"
                            alt="Foto profil pengguna"
                        >
                    </div>
                    <div class="profile-user-info">
                        <h2 class="profile-user-name">
                            Zaki Rizal
                        </h2>
                        <p class="profile-user-email">
                            zakigaming67@student.ac.id
                        </p>
                        <button
                            type="button"
                            class="profile-edit-button"
                            disabled
                            title="Edit profil belum tersedia"
                        >
                            <img
                                src="{{ asset('icons/edit.svg') }}"
                                alt=""
                            >
                            <span>Edit Profil</span>
                        </button>
                    </div>
                </div>
            </section>
            <section class="profile-menu-card">
                <h2 class="profile-section-title">
                    Aktivitas Saya
                </h2>
                <div class="profile-menu-list">
                    <a
                        href="{{ route('journal') }}"
                        class="profile-menu-item"
                    >
                        <img
                            src="{{ asset('icons/myjournal.svg') }}"
                            alt=""
                            class="profile-menu-icon"
                        >
                        <span class="profile-menu-label">
                            Jurnal Saya
                        </span>
                        <img
                            src="{{ asset('icons/arrow_right.svg') }}"
                            alt=""
                            class="profile-menu-arrow"
                        >
                    </a>
                    <div class="profile-menu-item">
                        <img
                            src="{{ asset('icons/history.svg') }}"
                            alt=""
                            class="profile-menu-icon"
                        >
                        <span class="profile-menu-label">
                            Riwayat Chat AI
                        </span>
                        <img
                            src="{{ asset('icons/arrow_right.svg') }}"
                            alt=""
                            class="profile-menu-arrow"
                        >
                    </div>
                    <a
                        href="{{ route('decision') }}"
                        class="profile-menu-item"
                    >
                        <img
                            src="{{ asset('icons/support.svg') }}"
                            alt=""
                            class="profile-menu-icon"
                        >
                        <span class="profile-menu-label">
                            Decision &amp; Crisis<br>
                            Support
                        </span>
                        <img
                            src="{{ asset('icons/arrow_right.svg') }}"
                            alt=""
                            class="profile-menu-arrow"
                        >
                    </a>
                </div>
            </section>
            <section class="profile-menu-card">
                <h2 class="profile-section-title">
                    Konsultasi
                </h2>

                <div class="profile-menu-list">
                    <div class="profile-menu-item">
                        <img
                            src="{{ asset('icons/mysession.svg') }}"
                            alt=""
                            class="profile-menu-icon"
                        >
                        <span class="profile-menu-label">
                            Sesi Saya
                        </span>
                        <img
                            src="{{ asset('icons/arrow_right.svg') }}"
                            alt=""
                            class="profile-menu-arrow"
                        >
                    </div>
                </div>
            </section>
            <section class="profile-menu-card">
                <h2 class="profile-section-title">
                    Privasi &amp; Data
                </h2>
                <div class="profile-menu-list">
                    <div class="profile-menu-item">
                        <img
                            src="{{ asset('icons/anonymous.svg') }}"
                            alt=""
                            class="profile-menu-icon"
                        >
                        <span class="profile-menu-label">
                            Anonymous Mode
                        </span>
                        <img
                            src="{{ asset('icons/arrow_right.svg') }}"
                            alt=""
                            class="profile-menu-arrow"
                        >
                    </div>
                </div>
            </section>
        </main>
        <nav
            class="profile-bottom-nav"
            aria-label="Navigasi utama"
        >
            <a
                href="{{ route('home') }}"
                class="profile-nav-item"
            >
                <img
                    src="{{ asset('icons/home.svg') }}"
                    alt=""
                >
                <span>Home</span>
            </a>
            <a
                href="{{ route('psikolog') }}"
                class="profile-nav-item"
            >
                <img
                    src="{{ asset('icons/psikolog.svg') }}"
                    alt=""
                >
                <span>Psikolog</span>
            </a>
            <a
                href="{{ route('chat-option') }}"
                class="profile-nav-item"
            >
                <img
                    src="{{ asset('icons/chat.svg') }}"
                    alt=""
                >
                <span>Chat</span>
            </a>
            <a
                href="{{ route('journal') }}"
                class="profile-nav-item"
            >
                <img
                    src="{{ asset('icons/journal.svg') }}"
                    alt=""
                >
                <span>Journal</span>
            </a>
            <a
                href="{{ route('profile') }}"
                class="profile-nav-item active"
                aria-current="page"
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