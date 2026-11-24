<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Cerita Kita')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Plus+Jakarta+Sans:wght@400;600&family=Poppins:wght@400;600&display=swap"
    rel="stylesheet"
>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
<link
    rel="manifest"
    href="{{ asset('manifest.json') }}"
>
<meta
    name="theme-color"
    content="#D7E5DB"
>
<meta
    name="apple-mobile-web-app-capable"
    content="yes"
>
<meta
    name="apple-mobile-web-app-status-bar-style"
    content="default"
>
<link
    rel="apple-touch-icon"
    href="{{ asset('pwa/icon-192.png') }}"
>
</head>
<body>
    <main>
        @yield('content')
    </main>
    @stack('scripts')
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker
                    .register("{{ asset('sw.js') }}")
                    .then(function (registration) {
                        console.log(
                            'CeritaKita PWA aktif:',
                            registration.scope
                        );
                    })
                    .catch(function (error) {
                        console.error(
                            'PWA gagal didaftarkan:',
                            error
                        );
                    });
            });
        }
    </script>
</body>
</html>