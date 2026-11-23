@extends('layouts.app')

@section('title', 'Pilih Musik - Cerita Kita')

@push('styles')
    @vite('resources/css/pages/music.css')
@endpush

@section('content')

@php
    $musics = [
        [
            'id' => 'alam',
            'title' => 'Tenang di Alam',
            'description' => 'Suara hutan dan burung.',
            'icon' => 'music1.svg',
        ],
        [
            'id' => 'laut',
            'title' => 'Gelombang Laut',
            'description' => 'Suara debur ombak.',
            'icon' => 'music2.svg',
        ],
        [
            'id' => 'hujan',
            'title' => 'Hujan Lembut',
            'description' => 'Suara hujan menenangkan.',
            'icon' => 'music3.svg',
        ],
        [
            'id' => 'piano',
            'title' => 'Piano Relaksasi',
            'description' => 'Alunan piano yang lembut.',
            'icon' => 'music4.svg',
        ],
        [
            'id' => 'lofi',
            'title' => 'Lo-fi Fokus',
            'description' => 'Musik instrumental ringan.',
            'icon' => 'music5.svg',
        ],
    ];
@endphp

<section class="music-page">
    <div class="music-container">
        <div class="music-panel">
            <a
                href="{{ route('breathing-space') }}"
                class="music-back"
                aria-label="Kembali ke Breathing Space"
            >
                <img
                    src="{{ asset('icons/arrow_back.svg') }}"
                    alt=""
                >
            </a>
            <h1 class="music-title">
                Pilih Musik
            </h1>
            <p class="music-description">
                Pilih musik yang membuatmu lebih tenang
                selama latihan pernapasan.
            </p>
            <div class="music-list">
                @foreach ($musics as $music)
                    <button
                        type="button"
                        class="music-option"
                        data-music-id="{{ $music['id'] }}"
                        data-music-title="{{ $music['title'] }}"
                        aria-pressed="false"
                    >
                        <span class="music-thumbnail">
                            <img
                                src="{{ asset('icons/' . $music['icon']) }}"
                                alt=""
                            >
                        </span>
                        <span class="music-info">
                            <span class="music-name">
                                {{ $music['title'] }}
                            </span>
                            <span class="music-detail">
                                {{ $music['description'] }}
                            </span>
                        </span>
                        <span class="music-play">

                            <img
                                src="{{ asset('icons/play_music.svg') }}"
                                alt=""
                            >
                        </span>
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</section>
<div
    id="music-modal"
    class="music-modal-overlay"
    hidden
>
    <div
        class="music-modal-card"
        role="dialog"
        aria-modal="true"
        aria-labelledby="music-modal-title"
        aria-describedby="music-modal-description"
    >
        <button
            type="button"
            id="music-modal-close"
            class="music-modal-close"
            aria-label="Tutup modal"
        >
            &times;
        </button>
        <div class="music-modal-icon">
            <img
                src="{{ asset('icons/music6.svg') }}"
                alt=""
            >
        </div>
        <h2
            id="music-modal-title"
            class="music-modal-title"
        >
            Gunakan Musik Ini?
        </h2>
        <p
            id="music-modal-selected"
            class="music-modal-selected"
        >
            Tenang di Alam
        </p>
        <p
            id="music-modal-description"
            class="music-modal-description"
        >
            Musik ini akan diputar selama latihan
            pernapasan berlangsung.
        </p>
        <div class="music-modal-actions">
            <button
                type="button"
                id="music-modal-confirm"
                class="music-modal-confirm"
            >
                Gunakan Musik Ini
            </button>
            <button
                type="button"
                id="music-modal-cancel"
                class="music-modal-cancel"
            >
                Pilih Musik Lain
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const musicOptions = Array.from(
        document.querySelectorAll('.music-option')
    );
    const musicModal =
        document.getElementById('music-modal');
    const selectedMusicText =
        document.getElementById('music-modal-selected');
    const confirmButton =
        document.getElementById('music-modal-confirm');
    const cancelButton =
        document.getElementById('music-modal-cancel');
    const closeButton =
        document.getElementById('music-modal-close');
    const breathingUrl =
        "{{ route('breathing-space') }}";
    let pendingMusic = null;
    let previousFocus = null;
    function updateSelectedMusic(musicId) {
        musicOptions.forEach(function (option) {
            const isSelected =
                option.dataset.musicId === musicId;
            option.classList.toggle(
                'is-selected',
                isSelected
            );
            option.setAttribute(
                'aria-pressed',
                String(isSelected)
            );
        });
    }
    const savedMusic =
        sessionStorage.getItem('ceritakita.music');
    updateSelectedMusic(savedMusic || 'alam');
    function openMusicModal(option) {
        pendingMusic = {
            id: option.dataset.musicId,
            title: option.dataset.musicTitle
        };
        selectedMusicText.textContent =
            pendingMusic.title;
        previousFocus = document.activeElement;
        musicModal.hidden = false;
        document.body.style.overflow = 'hidden';
        confirmButton.focus();
    }
    musicOptions.forEach(function (option) {
        option.addEventListener('click', function () {
            openMusicModal(option);
        });
    });
    function closeMusicModal() {
        musicModal.hidden = true;
        document.body.style.overflow = '';
        pendingMusic = null;
        if (previousFocus) {
            previousFocus.focus();
        }
    }
    closeButton.addEventListener(
        'click',
        closeMusicModal
    );
    cancelButton.addEventListener(
        'click',
        closeMusicModal
    );
    musicModal.addEventListener('click', function (event) {
        if (event.target === musicModal) {
            closeMusicModal();
        }
    });
    confirmButton.addEventListener('click', function () {
        if (!pendingMusic) return;
        sessionStorage.setItem(
            'ceritakita.music',
            pendingMusic.id
        );
        updateSelectedMusic(pendingMusic.id);
        document.body.style.overflow = '';
        window.location.assign(breathingUrl);
    });
    document.addEventListener('keydown', function (event) {
        if (musicModal.hidden) return;
        if (event.key === 'Escape') {
            closeMusicModal();
            return;
        }
        if (event.key === 'Tab') {
            const focusables = [
                closeButton,
                confirmButton,
                cancelButton
            ];
            const first = focusables[0];
            const last = focusables[focusables.length - 1];
            if (
                event.shiftKey &&
                document.activeElement === first
            ) {
                event.preventDefault();
                last.focus();
            } else if (
                !event.shiftKey &&
                document.activeElement === last
            ) {
                event.preventDefault();
                first.focus();
            }
        }
    });
});
</script>

@endpush