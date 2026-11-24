@extends('layouts.app')

@section('title', 'Pilih Kategori - CeritaKita')

@push('styles')
    @vite('resources/css/pages/decision.css')
@endpush

@section('content')

<section class="decision-page">
    <div class="decision-container">
        <header class="decision-header">
            <a
                href="{{ route('journal-summary') }}"
                class="decision-back"
                aria-label="Kembali ke Journal Summary"
            >
                <img
                    src="{{ asset('icons/arrow_back.svg') }}"
                    alt=""
                >
            </a>
            <h1>Pilih Kategori</h1>
        </header>
        <main class="decision-content">
            <div class="decision-illustration">
                <img
                    src="{{ asset('images/decision_image.png') }}"
                    alt="Ilustrasi seseorang sedang berpikir"
                >
            </div>
            <p class="decision-description">
                Butuh bantuan untuk
                memutuskan sesuatu atau
                sedang dalam kondisi sulit?
            </p>
            <div class="decision-options">
                <a
                    href="{{ route('decision-summary') }}"
                    class="decision-option"
                    aria-label="Timbang dan Putuskan"
                >
                    <div class="decision-option-icon">
                        <img
                            src="{{ asset('icons/decision_icon1.svg') }}"
                            alt=""
                        >
                    </div>
                    <div class="decision-option-info">
                        <h2 class="decision-option-title">
                            Timbang &amp; Putuskan
                        </h2>
                        <p class="decision-option-description">
                            Bantu saya mengambil keputusan
                        </p>
                    </div>
                </a>
                <a
                    href="{{ route('action-plan', ['from' => 'decision']) }}"
                    class="decision-option"
                    aria-label="Butuh Bantuan Sekarang"
                >
                    <div class="decision-option-icon">
                        <img
                            src="{{ asset('icons/decision_icon2.svg') }}"
                            alt=""
                        >
                    </div>
                    <div class="decision-option-info">
                        <h2 class="decision-option-title">
                            Butuh Bantuan Sekarang
                        </h2>
                        <p class="decision-option-description">
                            Saya merasa kewalahan atau
                            dalam kondisi kritis
                        </p>
                    </div>
                </a>
            </div>
        </main>
    </div>
</section>

@endsection