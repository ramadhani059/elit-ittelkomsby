const preLoad = function () {
    return caches.open("offline").then(function (cache) {
        // caching index and important routes
        return cache.addAll(filesToCache);
    });
};

self.addEventListener("install", function (event) {
    event.waitUntil(preLoad());
});

const filesToCache = [
    '/',
    '/home',
    '/catalog',
    '/assets/img/favicon/favicon.png',
    '/assets/img/home/poster.jpg',
    '/assets/img/home/1.png',
    '/assets/img/icons/logo/logo-warna.png',
    '/assets/anggota/css/owl.carousel.min.css',
    '/assets/anggota/css/owl.theme.default.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css',
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'https://cdn.jsdelivr.net/npm/iconify-icon@1.0.2/dist/iconify-icon.min.js',
    '/assets/css/style.css',
    '/assets/vendor/fonts/boxicons.css',
    '/assets/vendor/css/core.css',
    '/assets/vendor/css/theme-default.css',
    '/assets/css/demo.css',
    '/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
    '/assets/vendor/libs/apex-charts/apex-charts.css',
    '/assets/vendor/js/helpers.js',
    '/assets/js/config.js',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',
    '/assets/anggota/js/jquery.min.js',
    '/assets/anggota/js/popper.js',
    '/assets/anggota/js/bootstrap.min.js',
    '/assets/anggota/js/main.js',
    '/offline.html',
    '/assets/anggota/js/owl.carousel.min.js',
];

const checkResponse = function (request) {
    return new Promise(function (fulfill, reject) {
        fetch(request).then(function (response) {
            if (response.status !== 404) {
                fulfill(response);
            } else {
                reject();
            }
        }, reject);
    });
};

const addToCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return fetch(request).then(function (response) {
            return cache.put(request, response);
        });
    });
};

const returnFromCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return cache.match(request).then(function (matching) {
            if (!matching || matching.status === 404) {
                return cache.match("offline.html");
            } else {
                return matching;
            }
        });
    });
};

self.addEventListener("fetch", function (event) {
    event.respondWith(checkResponse(event.request).catch(function () {
        return returnFromCache(event.request);
    }));
    if(!event.request.url.startsWith('http')){
        event.waitUntil(addToCache(event.request));
    }
});
