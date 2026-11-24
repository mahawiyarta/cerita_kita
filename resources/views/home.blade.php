@extends('layouts.app')

@section('title', 'Home - Cerita Kita')

@push('styles')
    @vite('resources/css/pages/home.css')
@endpush

@section('content')

@php
    $moods = [
        ['value' => 1, 'icon' => 'emoji1.svg', 'label' => 'Buruk'],
        ['value' => 2, 'icon' => 'emoji2.svg', 'label' => '2'],
        ['value' => 3, 'icon' => 'emoji3.svg', 'label' => '3'],
        ['value' => 4, 'icon' => 'emoji4.svg', 'label' => '4'],
        ['value' => 5, 'icon' => 'emoji5.svg', 'label' => 'Baik'],
    ];
    $moodTags = [
        'Cemas',
        'Overwhelmed',
        'Mati Rasa',
        'Biasa Aja',
    ];
    $weeklyMood = [
        ['day' => 'S', 'height' => 55],
        ['day' => 'S', 'height' => 80],
        ['day' => 'R', 'height' => 55],
        ['day' => 'K', 'height' => 105],
        ['day' => 'J', 'height' => 32],
        ['day' => 'S', 'height' => 0],
        ['day' => 'M', 'height' => 0],
    ];
@endphp

<section class="home-page">
    <div class="home-container">
        <header class="home-header">
            <h1 class="home-greeting">
                Halo, Zaki!
            </h1>
            <div class="home-streak">
                <img
                    src="{{ asset('icons/streak.svg') }}"
                    alt=""
                >
                <span>5 Days Streak</span>
            </div>
        </header>
        <div class="home-content">
            <section class="home-mood-section">
                <h2 class="home-section-title">
                    Apa kabarmu hari ini?
                </h2>
                <div class="home-mood-list">
                    @foreach ($moods as $mood)
                        <button
                            type="button"
                            class="home-mood-option"
                            data-mood="{{ $mood['value'] }}"
                            aria-pressed="false"
                        >
                            <span class="home-mood-icon">
                                <img
                                    src="{{ asset('icons/' . $mood['icon']) }}"
                                    alt=""
                                >
                            </span>
                            <span class="home-mood-label">
                                {{ $mood['label'] }}
                            </span>
                        </button>
                    @endforeach
                </div>
                <div class="home-mood-tags">
                    @foreach ($moodTags as $tag)
                        <button
                            type="button"
                            class="home-mood-tag"
                            aria-pressed="false"
                        >
                            {{ $tag }}
                        </button>
                    @endforeach
                    <button
                        type="button"
                        class="home-mood-tag"
                        id="add-mood-tag"
                        aria-label="Tambah kategori perasaan"
                    >
                        <img
                            src="{{ asset('icons/plus.svg') }}"
                            alt=""
                            width="16"
                            height="16"
                        >
                    </button>
                </div>
                <button
                    type="button"
                    id="home-checkin-button"
                    class="home-checkin-button"
                >
                    Check in
                </button>
                <p
                    id="home-checkin-feedback"
                    role="status"
                    aria-live="polite"
                    class="mt-2 text-center text-xs text-gray-500"
                ></p>
            </section>
            <section class="home-chart-section">
                <h2 class="home-section-title">
                    Tren Emosimu Minggu Ini
                </h2>
                <div
                    class="home-chart"
                    role="img"
                    aria-label="Contoh grafik emosi mingguan dari Senin sampai Minggu"
                >
                    <div class="home-chart-scale" aria-hidden="true">
                        @for ($i = 5; $i >= 1; $i--)
                            <img
                                src="{{ asset('icons/emoji' . $i . '.svg') }}"
                                alt=""
                            >
                        @endfor
                    </div>
                    <div class="home-chart-bars">
                        @foreach ($weeklyMood as $bar)
                            <div class="home-chart-day">
                                @if ($bar['height'] > 0)
                                    <span
                                        class="home-chart-bar"
                                        style="height: {{ $bar['height'] }}px"
                                    ></span>
                                @endif
                                <span class="home-chart-day-label">
                                    {{ $bar['day'] }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <p class="home-chart-description">
                    Kamu merasa lebih stabil dibanding minggu lalu.
                </p>
            </section>
            <section class="home-breathing-section">
            <a
                href="{{ route('breathing-space') }}"
                class="home-breathing-card"
                aria-label="Masuk ke Breathing Space"
            >
                <img
                    src="{{ asset('images/breathing_space2.png') }}"
                    alt=""
                    class="home-breathing-image"
                >
                <h2 class="home-breathing-title">
                    Breathing Space
                </h2>
            </a>
            </section>
        </div>
        <nav
            class="home-bottom-nav"
            aria-label="Navigasi utama"
        >
            <a
                href="{{ route('home') }}"
                class="home-nav-item active"
                aria-current="page"
            >
                <img
                    src="{{ asset('icons/home.svg') }}"
                    alt=""
                >
                <span>Home</span>
            </a>
            <a
                href="{{ route('psikolog') }}"
                class="home-nav-item"
            >
                <img
                    src="{{ asset('icons/psikolog.svg') }}"
                    alt=""
                >
                <span>Psikolog</span>
            </a>
            <a
                href="{{ route('chat-option') }}"
                class="home-nav-item"
            >
                <img
                    src="{{ asset('icons/chat.svg') }}"
                    alt=""
                >
                <span>Chat</span>
            </a>    
            <a
                href="{{ route('journal') }}"
                class="home-nav-item"
            >
                <img
                    src="{{ asset('icons/journal.svg') }}"
                    alt=""
                >
                <span>Journal</span>
            </a> 
            <a
                href="{{ route('profile') }}"
                class="home-nav-item"
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
@include('components.modal-checkin')

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const moodOptions =
        document.querySelectorAll('.home-mood-option');
    const moodTags =
        document.querySelectorAll(
            '.home-mood-tag:not(#add-mood-tag)'
        );
    const checkinButton =
        document.getElementById('home-checkin-button');
    const feedback =
        document.getElementById('home-checkin-feedback');
    const addMoodTagButton =
        document.getElementById('add-mood-tag');
    const checkinModal =
        document.getElementById('checkin-modal');
    const checkinModalClose =
        document.getElementById('checkin-modal-close');
    let selectedMood = null;
    let previousFocus = null;
    moodOptions.forEach(function (option) {
        option.addEventListener('click', function () {
            moodOptions.forEach(function (item) {
                item.classList.remove('selected');
                item.setAttribute(
                    'aria-pressed',
                    'false'
                );
            });
            option.classList.add('selected');
            option.setAttribute(
                'aria-pressed',
                'true'
            );
            selectedMood = option.dataset.mood;
            feedback.textContent = '';
        });
    });
    moodTags.forEach(function (tag) {
        tag.addEventListener('click', function () {
            const isSelected =
                tag.classList.toggle('selected');
            tag.setAttribute(
                'aria-pressed',
                String(isSelected)
            );
        });
    });
    addMoodTagButton.addEventListener(
        'click',
        function () {
            feedback.textContent =
                'Fitur tambah kategori akan dibuat pada tahap berikutnya.';
        }
    );
    function openCheckinModal() {
        previousFocus = document.activeElement;
        checkinModal.hidden = false;
        document.body.style.overflow = 'hidden';
        checkinModalClose.focus();
    }
    function closeCheckinModal() {
        checkinModal.hidden = true;
        document.body.style.overflow = '';
        if (previousFocus) {
            previousFocus.focus();
        }
    }
    checkinButton.addEventListener('click', function () {
        if (!selectedMood) {
            feedback.textContent =
                'Silakan pilih emosimu terlebih dahulu.';
            return;
        }
        feedback.textContent = '';
        openCheckinModal();
    });
    checkinModalClose.addEventListener(
        'click',
        function () {
            closeCheckinModal();
        }
    );
    checkinModal.addEventListener(
        'click',
        function (event) {
            if (event.target === checkinModal) {
                closeCheckinModal();
            }
        }
    );
    document.addEventListener('keydown', function (event) {
        if (checkinModal.hidden) {
            return;
        }
        if (event.key === 'Escape') {
            closeCheckinModal();
            return;
        }
        if (event.key === 'Tab') {
            event.preventDefault();
            checkinModalClose.focus();
        }
    });
});
</script>

@endpush