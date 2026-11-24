const CACHE_NAME = 'ceritakita-pwa-v1';
const OFFLINE_URL = '/offline.html';
const STATIC_ASSETS = [
    '/offline.html',
    '/pwa/icon-192.png',
    '/pwa/icon-512.png'
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then((cache) => {
                return cache.addAll(STATIC_ASSETS);
            })
            .then(() => {
                return self.skipWaiting();
            })
    );
});
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys()
            .then((keys) => {
                return Promise.all(
                    keys
                        .filter((key) => {
                            return key.startsWith('ceritakita-pwa-')
                                && key !== CACHE_NAME;
                        })
                        .map((key) => caches.delete(key))
                );
            })
            .then(() => self.clients.claim())
    );
});
self.addEventListener('fetch', (event) => {
    const request = event.request;
    if (request.method !== 'GET') {
        return;
    }
    if (request.mode !== 'navigate') {
        return;
    }
    const url = new URL(request.url);
    if (url.origin !== self.location.origin) {
        return;
    }
    event.respondWith(
        fetch(request)
            .catch(async () => {
                const offlinePage =
                    await caches.match(OFFLINE_URL);
                return offlinePage || Response.error();
            })
    );
});