@extends('layouts.app')

@section('title', 'Psikolog - CeritaKita')

@push('styles')
    @vite('resources/css/pages/psikolog.css')
@endpush

@section('content')

<section class="psikolog-page">
    <div class="psikolog-container">
        <header class="psikolog-header">
            <h1>Psikolog</h1>
            <div class="psikolog-header-actions">
                <button
                    type="button"
                    id="psikolog-search-toggle"
                    class="psikolog-header-button"
                    aria-label="Cari psikolog"
                    aria-expanded="false"
                    aria-controls="psikolog-search"
                >
                    <img
                        src="{{ asset('icons/search.svg') }}"
                        alt=""
                    >
                </button>
                <button
                    type="button"
                    class="psikolog-header-button"
                    title="Riwayat sesi belum tersedia"
                    aria-label="Riwayat sesi belum tersedia"
                    disabled
                >
                    <img
                        src="{{ asset('icons/session.svg') }}"
                        alt=""
                    >
                </button>
            </div>
        </header>
        <main class="psikolog-content">
            <div
                id="psikolog-search"
                class="psikolog-search"
                hidden
            >
                <input
                    type="search"
                    id="psikolog-search-input"
                    placeholder="Cari nama atau spesialisasi..."
                    aria-label="Cari nama atau spesialisasi psikolog"
                >
            </div>
            <div class="psikolog-progress">
                <div class="psikolog-progress-labels">
                    <span class="psikolog-step">
                        Langkah 1 dari 4
                    </span>
                    <span class="psikolog-step-title">
                        Pilih Psikolog Profesional
                    </span>
                </div>
                <div
                    class="psikolog-progress-track"
                    role="progressbar"
                    aria-label="Progres pemilihan psikolog"
                    aria-valuemin="0"
                    aria-valuemax="4"
                    aria-valuenow="1"
                >
                    <div class="psikolog-progress-fill">
                    </div>
                </div>
            </div>
            <div
                class="psikolog-session-types"
                role="group"
                aria-label="Jenis sesi"
            >
                <button
                    type="button"
                    class="psikolog-session-type active"
                    data-session="online"
                    aria-pressed="true"
                >
                    Online
                </button>
                <button
                    type="button"
                    class="psikolog-session-type"
                    data-session="offline"
                    aria-pressed="false"
                >
                    Offline
                </button>
                <button
                    type="button"
                    class="psikolog-session-type"
                    data-session="hybrid"
                    aria-pressed="false"
                >
                    Hybrid
                </button>
            </div>
            <div class="psikolog-location">
                <p class="psikolog-location-label">
                    Lokasi Domisili (Untuk Sesi Offline)
                </p>
                <div class="psikolog-location-box">
                    <img
                        src="{{ asset('icons/location.svg') }}"
                        alt=""
                        class="psikolog-location-icon"
                    >
                    <span>
                        Surabaya (Mengikuti lokasi aktifmu)
                    </span>
                    <img
                        src="{{ asset('icons/dropdown.svg') }}"
                        alt=""
                        class="psikolog-dropdown-icon"
                    >
                </div>
            </div>
            <div class="psikolog-list">
                <article
                    class="psikolog-card"
                    data-search="rizky amalia anxiety academic stress"
                >
                    <div class="psikolog-card-top">
                        <div class="psikolog-avatar">
                            <img
                                src="{{ asset('images/psikolog1.png') }}"
                                alt="Foto profil contoh Rizky Amalia"
                            >
                        </div>
                        <div class="psikolog-card-info">
                            <div class="psikolog-name-row">
                                <h2 class="psikolog-name">
                                    Rizky Amalia, M.Psi
                                </h2>
                                <span class="psikolog-rating">
                                    <img
                                        src="{{ asset('icons/rating.svg') }}"
                                        alt=""
                                    >
                                    4.9
                                </span>
                            </div>
                            <span class="psikolog-specialty">
                                Anxiety &amp; Academic Stress
                            </span>
                            <p class="psikolog-price">
                                Tarif Mahasiswa:
                                Rp150.000 / Sesi
                            </p>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="psikolog-schedule-button"
                        data-name="Rizky Amalia"
                    >
                        Pilih Jadwal
                    </button>
                    <p
                        class="psikolog-card-feedback"
                        role="status"
                    ></p>
                </article>
                <article
                    class="psikolog-card"
                    data-search="aris setiawan trauma self love"
                >
                    <div class="psikolog-card-top">
                        <div class="psikolog-avatar placeholder">
                            <img
                                src="{{ asset('icons/psikolog3.svg') }}"
                                alt="Ikon profil psikolog"
                            >
                        </div>
                        <div class="psikolog-card-info">
                            <div class="psikolog-name-row">
                                <h2 class="psikolog-name">
                                    Dr. Aris Setiawan
                                </h2>
                                <span class="psikolog-rating">
                                    <img
                                        src="{{ asset('icons/rating.svg') }}"
                                        alt=""
                                    >
                                    4.8
                                </span>
                            </div>
                            <span class="psikolog-specialty">
                                Trauma &amp; Self-Love
                            </span>
                            <p class="psikolog-price">
                                Tarif Mahasiswa:
                                Rp200.000 / Sesi
                            </p>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="psikolog-schedule-button"
                        data-name="Dr. Aris Setiawan"
                    >
                        Pilih Jadwal
                    </button>
                    <p
                        class="psikolog-card-feedback"
                        role="status"
                    ></p>
                </article>
                <article
                    class="psikolog-card"
                    data-search="nina safitri relationship burnout"
                >
                    <div class="psikolog-card-top">
                        <div class="psikolog-avatar placeholder">
                            <img
                                src="{{ asset('icons/psikolog3.svg') }}"
                                alt="Ikon profil psikolog"
                            >
                        </div>
                        <div class="psikolog-card-info">
                            <div class="psikolog-name-row">
                                <h2 class="psikolog-name">
                                    Nina Safitri, M.Psi
                                </h2>
                                <span class="psikolog-rating">
                                    <img
                                        src="{{ asset('icons/rating.svg') }}"
                                        alt=""
                                    >
                                    5.0
                                </span>
                            </div>
                            <span class="psikolog-specialty">
                                Relationship &amp; Burnout
                            </span>
                            <p class="psikolog-price">
                                Tarif Mahasiswa:
                                Rp175.000 / Sesi
                            </p>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="psikolog-schedule-button"
                        data-name="Nina Safitri"
                    >
                        Pilih Jadwal
                    </button>
                    <p
                        class="psikolog-card-feedback"
                        role="status"
                    ></p>
                </article>
            </div>
            <p
                id="psikolog-no-results"
                class="psikolog-no-results"
                hidden
            >
                Tidak ada psikolog yang cocok
                dengan pencarianmu.
            </p>
        </main>
        <nav
            class="psikolog-bottom-nav"
            aria-label="Navigasi utama"
        >
            <a
                href="{{ route('home') }}"
                class="psikolog-nav-item"
            >
                <img
                    src="{{ asset('icons/home.svg') }}"
                    alt=""
                >
                <span>Home</span>
            </a>
            <a
                href="{{ route('psikolog') }}"
                class="psikolog-nav-item active"
                aria-current="page"
            >
                <img
                    src="{{ asset('icons/psikolog.svg') }}"
                    alt=""
                >
                <span>Psikolog</span>
            </a>
            <a
                href="{{ route('chat-option') }}"
                class="psikolog-nav-item"
            >
                <img
                    src="{{ asset('icons/chat.svg') }}"
                    alt=""
                >
                <span>Chat</span>
            </a>
            <a
                href="{{ route('journal') }}"
                class="psikolog-nav-item"
            >
                <img
                    src="{{ asset('icons/journal.svg') }}"
                    alt=""
                >
                <span>Journal</span>
            </a>
            <span
                class="psikolog-nav-item"
                aria-disabled="true"
            >
                <img
                    src="{{ asset('icons/profile.svg') }}"
                    alt=""
                >
                <span>Profile</span>
            </span>
        </nav>
    </div>
</section>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {
    const sessionButtons = document.querySelectorAll(
        '.psikolog-session-type'
    );
    sessionButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            sessionButtons.forEach(function (item) {
                item.classList.remove('active');
                item.setAttribute('aria-pressed', 'false');
            });
            button.classList.add('active');
            button.setAttribute('aria-pressed', 'true');
        });
    });
    const searchToggle = document.getElementById(
        'psikolog-search-toggle'
    );
    const searchBox = document.getElementById(
        'psikolog-search'
    );
    const searchInput = document.getElementById(
        'psikolog-search-input'
    );
    const cards = document.querySelectorAll(
        '.psikolog-card'
    );
    const noResults = document.getElementById(
        'psikolog-no-results'
    );
    searchToggle.addEventListener('click', function () {
        const isOpening = searchBox.hidden;
        searchBox.hidden = !isOpening;
        searchToggle.setAttribute(
            'aria-expanded',
            String(isOpening)
        );
        if (isOpening) {
            searchInput.focus();
        } else {
            searchInput.value = '';
            filterPsychologists();
        }
    });
    function filterPsychologists() {
        const keyword = searchInput.value
            .toLowerCase()
            .trim();
        let visibleCount = 0;
        cards.forEach(function (card) {
            const searchableText =
                card.dataset.search || '';
            const matches =
                searchableText.includes(keyword);
            card.hidden = !matches;
            if (matches) {
                visibleCount++;
            }
        });
        noResults.hidden = visibleCount > 0;
    }
    searchInput.addEventListener(
        'input',
        filterPsychologists
    );
    const scheduleButtons = document.querySelectorAll(
        '.psikolog-schedule-button'
    );
    scheduleButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const card = button.closest(
                '.psikolog-card'
            );
            const feedback = card.querySelector(
                '.psikolog-card-feedback'
            );
            feedback.textContent =
                'Pemilihan jadwal ' +
                button.dataset.name +
                ' belum tersedia pada tahap testing.';
        });
    });
});

</script>

@endpush