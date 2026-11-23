@extends('layouts.app')

@section('title', 'Login - Cerita Kita')

@push('styles')
    @vite('resources/css/pages/login.css')
@endpush

@section('content')

<section class="login-page">
    <div class="login-container">
        <div class="login-brand">
            <div class="login-logo-frame">
                <img
                    src="{{ asset('images/logo.svg') }}"
                    alt="Cerita Kita"
                    class="login-logo"
                >
            </div>
        </div>
        <p class="login-tagline">
            Tempat aman untuk bercerita<br>
            dan tumbuh lebih baik
        </p>
        <form id="login-form" class="login-form">
            <label for="email" class="sr-only">
                Email
            </label>
            <div class="login-input-wrapper">
                <img
                    src="{{ asset('icons/email.svg') }}"
                    alt=""
                    class="login-input-icon"
                >
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="login-input"
                    placeholder="Email"
                    autocomplete="email"
                    required
                >
            </div>
            <label for="password" class="sr-only">
                Password
            </label>
            <div class="login-input-wrapper">
                <img
                    src="{{ asset('icons/password.svg') }}"
                    alt=""
                    class="login-input-icon"
                >
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="login-input"
                    placeholder="Password"
                    autocomplete="current-password"
                    required
                >
                <button
                    type="button"
                    id="toggle-password"
                    class="login-eye-button"
                    aria-label="Tampilkan password"
                    aria-pressed="false"
                >
                    <img
                        src="{{ asset('icons/eye.svg') }}"
                        alt=""
                    >
                </button>
            </div>
            <button type="submit" class="login-button">
                Login
            </button>
        </form>
        <div class="login-separator"></div>
        <button
            type="button"
            id="anonymous-login-button"
            class="login-anonymous"
        >
            (Masuk secara anonim)
        </button>
        <p class="login-register">
            Belum punya akun?
            <a href="#" id="register-link">Daftar</a>
        </p>
        <p
            id="login-feedback"
            class="mt-3 text-center text-xs text-gray-500"
            role="status"
            aria-live="polite"
        ></p>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('toggle-password');
    const feedback = document.getElementById('login-feedback');
    toggleButton.addEventListener('click', function () {
        const isHidden = passwordInput.type === 'password';
        passwordInput.type = isHidden ? 'text' : 'password';
        toggleButton.setAttribute(
            'aria-label',
            isHidden ? 'Sembunyikan password' : 'Tampilkan password'
        );
        toggleButton.setAttribute('aria-pressed', String(isHidden));
    });
    document.getElementById('login-form')
        .addEventListener('submit', function (event) {
            event.preventDefault();
            feedback.textContent =
                'Fitur login belum terhubung ke backend.';
        });
    document.getElementById('anonymous-login-button')
        .addEventListener('click', function () {
            feedback.textContent =
                'Modal anonim akan ditambahkan pada tahap berikutnya.';
        });
    document.getElementById('register-link')
        .addEventListener('click', function (event) {
            event.preventDefault();
            feedback.textContent =
                'Halaman pendaftaran belum tersedia.';
        });
});
</script>
@endpush