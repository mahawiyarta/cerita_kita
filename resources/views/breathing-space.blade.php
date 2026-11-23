@extends('layouts.app')

@section('title', 'Breathing Space - Cerita Kita')

@push('styles')
    @vite('resources/css/pages/breathing-space.css')
@endpush

@section('content')

<section class="breathing-page">
    <div class="breathing-container">
        <div class="breathing-panel">
            <div class="breathing-toolbar">
                <a
                    href="{{ route('home') }}"
                    class="breathing-back"
                    aria-label="Kembali ke Home"
                >
                    <img
                        src="{{ asset('icons/arrow_back.svg') }}"
                        alt=""
                    >
                </a>
                <a
                    href="{{ route('music') }}"
                    class="breathing-music-link"
                    aria-label="Pilih musik"
                >
                    <img
                        src="{{ asset('icons/music.svg') }}"
                        alt=""
                    >
                </a>
            </div>
            <div class="breathing-heading">
                <h1 class="breathing-title">
                    Ambil napas dalam...
                </h1>
                <p class="breathing-subtitle">
                    Yuk tenangkan pikiranmu.
                </p>
            </div>
            <div class="breathing-scene">
                <img
                    src="{{ asset('images/breathing_space2.png') }}"
                    alt="Pemandangan pegunungan dan pepohonan"
                    class="breathing-scene-image"
                >
                <button
                    type="button"
                    class="breathing-ring"
                    id="breathing-ring"
                    aria-label="Mulai latihan pernapasan"
                >
                    <span class="breathing-ring-content">
                        <span
                            class="breathing-phase"
                            id="breathing-phase"
                            aria-live="polite"
                        >
                            Tarik napas
                        </span>
                        <strong
                            class="breathing-count"
                            id="breathing-count"
                            role="timer"
                            aria-live="off"
                        >
                            5
                        </strong>
                        <span class="breathing-seconds">
                            detik
                        </span>
                    </span>
                </button>
            </div>
            <p
                class="breathing-start-hint"
                id="breathing-start-hint"
            >
                Ketuk lingkaran untuk mulai
            </p>
            <div class="breathing-spacer"></div>
            <button
                type="button"
                class="breathing-next"
                id="breathing-next"
            >
                Lanjut
            </button>
            <p
                id="breathing-feedback"
                class="breathing-feedback"
                role="status"
                aria-live="polite"
            ></p>
        </div>
    </div>
</section>

@endsection

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const breathingRing =
        document.getElementById('breathing-ring');
    const breathingPhase =
        document.getElementById('breathing-phase');
    const breathingCount =
        document.getElementById('breathing-count');
    const startHint =
        document.getElementById('breathing-start-hint');
    const nextButton =
        document.getElementById('breathing-next');
    const feedback =
        document.getElementById('breathing-feedback');
    const phases = [
        {
            name: 'Tarik napas',
            duration: 5,
            className: 'is-inhaling'
        },
        {
            name: 'Hembuskan',
            duration: 5,
            className: 'is-exhaling'
        }
    ];
    let hasStarted = false;
    let currentPhaseIndex = 0;
    let countdownInterval = null;
    let transitionTimeout = null;
    let phaseStartTime = 0;
    function startBreathingPhase(index) {
        clearInterval(countdownInterval);
        clearTimeout(transitionTimeout);
        currentPhaseIndex = index;
        const currentPhase = phases[index];
        phaseStartTime = performance.now();
        breathingPhase.textContent = currentPhase.name;
        breathingCount.textContent = currentPhase.duration;
        breathingRing.classList.remove(
            'is-inhaling',
            'is-exhaling'
        );
        breathingRing.classList.add(
            currentPhase.className
        );
        countdownInterval = setInterval(function () {
            const elapsed =
                (performance.now() - phaseStartTime) / 1000;
            const remainingSeconds = Math.max(
                0,
                Math.ceil(currentPhase.duration - elapsed)
            );
            breathingCount.textContent =
                remainingSeconds;
            if (elapsed >= currentPhase.duration) {
                clearInterval(countdownInterval);
                breathingCount.textContent = '0';
                transitionTimeout = setTimeout(function () {
                    const nextPhaseIndex =
                        (currentPhaseIndex + 1) % phases.length;
                    startBreathingPhase(nextPhaseIndex);
                }, 350);
            }
        }, 50);
    }
    breathingRing.addEventListener('click', function () {
        if (hasStarted) {
            return;
        }
        hasStarted = true;
        startHint.hidden = true;
        breathingRing.setAttribute(
            'aria-label',
            'Latihan pernapasan sedang berjalan'
        );
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                startBreathingPhase(0);
            });
        });
    });
    nextButton.addEventListener('click', function () {
        window.location.href = "{{ route('after-breathing') }}";
    });
    window.addEventListener('pagehide', function () {
        clearInterval(countdownInterval);
        clearTimeout(transitionTimeout);
    });
});
</script>

@endpush