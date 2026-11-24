@extends('layouts.app')

@section('title', 'Ringkasan Pertimbangan - CeritaKita')

@push('styles')
    @vite('resources/css/pages/decision-summary.css')
@endpush

@section('content')

<section class="decision-summary-page">
    <div class="decision-summary-container">
        <header class="decision-summary-header">
            <a
                href="{{ route('decision') }}"
                class="decision-summary-back"
                aria-label="Kembali ke Pilih Kategori"
            >
                <img
                    src="{{ asset('icons/arrow_back.svg') }}"
                    alt=""
                >
            </a>
            <h1>Timbang &amp; Putuskan</h1>
        </header>
        <main class="decision-summary-content">
            <h2 class="decision-summary-title">
                Ringkasan Pertimbangan
            </h2>
            <div class="decision-summary-list">
                <article class="decision-summary-card">
                    <p class="decision-summary-option-label">
                        Pilihan 1
                    </p>
                    <h3 class="decision-summary-option-title">
                        Melanjutkan kuliah
                    </h3>
                    <div class="decision-summary-section">
                        <h4
                            class="decision-summary-section-title positive"
                        >
                            Kelebihan
                        </h4>
                        <ul class="decision-summary-points">
                            <li>
                                Kesempatan karier jangka
                                panjang lebih luas
                            </li>
                            <li>
                                Bisa eksplor minat dan
                                organisasi kampus
                            </li>
                        </ul>
                    </div>
                    <div class="decision-summary-section">
                        <h4
                            class="decision-summary-section-title negative"
                        >
                            Kekurangan
                        </h4>
                        <ul class="decision-summary-points">
                            <li>
                                Membutuhkan biaya dan
                                energi tambahan
                            </li>
                            <li>
                                Belum memiliki
                                penghasilan tetap
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="decision-summary-card">
                    <p class="decision-summary-option-label">
                        Pilihan 2
                    </p>
                    <h3 class="decision-summary-option-title">
                        Menerima Pekerjaan
                    </h3>
                    <div class="decision-summary-section">
                        <h4
                            class="decision-summary-section-title positive"
                        >
                            Kelebihan
                        </h4>
                        <ul class="decision-summary-points">
                            <li>
                                Bisa membantu kondisi
                                finansial diri/keluarga
                            </li>
                            <li>
                                Belajar dunia profesional
                            </li>
                        </ul>
                    </div>
                    <div class="decision-summary-section">
                        <h4
                            class="decision-summary-section-title negative"
                        >
                            Kekurangan
                        </h4>
                        <ul class="decision-summary-points">
                            <li>
                                Risiko sulit melanjutkan
                                kuliah
                            </li>
                            <li>
                                Takut salah memilih jalur
                                karier terlalu cepat
                            </li>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="decision-summary-actions">
                <a
                    href="{{ route('action-plan', ['from' => 'summary']) }}"
                    class="decision-summary-button"
                >
                    Lanjut
                </a>
            </div>
        </main>
    </div>
</section>

@endsection