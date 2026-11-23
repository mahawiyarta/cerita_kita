@extends('layouts.app')

@section('title', 'Sesi Selesai - Cerita Kita')

@push('styles')
    @vite('resources/css/pages/after-breathing.css')
@endpush

@section('content')

<section class="after-breathing-page">
    <div class="after-breathing-container">
        <div class="after-breathing-content">
            <img
                src="{{ asset('images/after_breathing.png') }}"
                alt="Ilustrasi seseorang yang sedang duduk tenang di tengah alam"
                class="after-breathing-image"
            >
            <h1 class="after-breathing-title">
                Sesi Selesai, Kerjamu Bagus!
            </h1>
            <p class="after-breathing-description">
                Gimana rasanya? Pikiranmu sekarang
                harusnya sudah terasa sedikit lebih lega.
            </p>
            <div class="after-breathing-actions">
                <button
                    type="button"
                    class="after-breathing-button after-breathing-journal"
                    disabled
                >
                    Tulis Perasaan di Jurnal
                </button>
                <button
                    type="button"
                    class="after-breathing-button after-breathing-chat"
                    disabled
                >
                    Chat dengan AI
                </button>
            </div>
            <a
                href="{{ route('home') }}"
                class="after-breathing-home"
            >
                Kembali ke Home
            </a>
        </div>
    </div>
</section>

@endsection