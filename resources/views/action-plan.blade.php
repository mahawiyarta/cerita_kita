@extends('layouts.app')

@section('title', 'Rencana Tindakan - CeritaKita')

@push('styles')
    @vite('resources/css/pages/action-plan.css')
@endpush

@section('content')

@php
    $fromSummary = request()->query('from') === 'summary';
    $backRoute = $fromSummary
        ? route('decision-summary')
        : route('decision');
@endphp

<section class="action-plan-page">
    <div class="action-plan-container">
        <header class="action-plan-header">
            <a
                href="{{ $backRoute }}"
                class="action-plan-back"
                aria-label="Kembali ke halaman sebelumnya"
            >
                <img
                    src="{{ asset('icons/arrow_back.svg') }}"
                    alt=""
                >
            </a>
            <h1>Rencana Tindakan</h1>
        </header>
        <main class="action-plan-content">
            <div class="action-plan-illustration">
                <img
                    src="{{ asset('images/consultation.png') }}"
                    alt="Ilustrasi seseorang mendapatkan dukungan"
                >
            </div>
            <div class="action-plan-introduction">
                <h2 class="action-plan-title">
                    Langkah kecil hari ini,<br>
                    membawa perubahan besar.
                </h2>
                <p class="action-plan-description">
                    Buat rencana tindakan yang realistis
                    dan sesuai dengan kebutuhanmu saat ini.
                </p>
            </div>
            <article class="action-plan-card">
                <div class="action-plan-card-heading">
                    <h3 class="action-plan-card-title">
                        Konsultasi dengan Psikolog
                    </h3>
                    <span class="action-plan-badge">
                        Direkomendasikan
                    </span>
                </div>
                <p class="action-plan-card-description">
                    Dapatkan perspektif profesional
                    untuk membantumu mempertimbangkan
                    keputusan dengan lebih jernih.
                </p>
                <ul class="action-plan-benefits">
                    <li>
                        <img
                            src="{{ asset('icons/check.svg') }}"
                            alt=""
                        >
                        <span>
                            Ruang aman dan rahasia
                        </span>
                    </li>
                    <li>
                        <img
                            src="{{ asset('icons/check.svg') }}"
                            alt=""
                        >
                        <span>
                            Bantuan sesuai dengan
                            kondisi kebutuhanmu
                        </span>
                    </li>
                    <li>
                        <img
                            src="{{ asset('icons/check.svg') }}"
                            alt=""
                        >
                        <span>
                            Membantu mengurangi kecemasan
                            dan kebingungan
                        </span>
                    </li>
                </ul>
                <a
                    href="{{ route('psikolog') }}"
                    class="action-plan-consultation-button"
                >
                    Cari &amp; Pilih Psikolog
                </a>
            </article>
            <a
                href="{{ route('home') }}"
                class="action-plan-home-button"
            >
                Kembali ke Home
            </a>
        </main>
    </div>
</section>

@endsection