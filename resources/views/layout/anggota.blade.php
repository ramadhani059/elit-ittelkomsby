<!doctype html>
<html lang="en">
  <head>
    <!-- PWA  -->
    <meta name="theme-color" content="#FFFFFF"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <title>{{ $pageTitle }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>

    <!-- Page CSS -->
    @yield('css')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  <body>

        @php
            $route = Route::currentRouteName();
        @endphp

        <nav class="navbar navbar-expand-sm navbar-example navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a href="{{ url('/') }}" class="app-brand-link">
                    <img src="{{ asset('assets/img/icons/logo/logo-warna.png') }}" class="me-4" alt style="height: 55px;" />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                  >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link @if($route == 'home') fw-semibold active @endif" aria-current="page" href="{{ route('home') }}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{  (request()->is('catalog*')) ? 'fw-semibold active' : '' }}" href="{{ route('catalog') }}">Katalog</a>
                      </li>
                      <li class="nav-item @if($route == 'aboutus') fw-semibold active @endif">
                        <a class="nav-link" href="{{ route('aboutus') }}">Tentang Kami</a>
                      </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <div class="media-body d-lg-block f-grow-1">
                                        <a class="btn btn-danger" href="{{ route('login') }}">Masuk / Daftar</a>
                                    </div>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="media align-items-center d-flex ">
                                        <div class="media-body d-lg-block f-grow-1 me-4">
                                            @if (Auth::user() -> level == 'admin')
                                                <span class="fw-semibold d-block">{{ Auth::user() -> admin -> nama_lengkap }}</span>
                                            @else
                                                <span class="fw-semibold d-block">{{ Auth::user() -> anggota -> nama_lengkap }}</span>
                                            @endif
                                        </div>
                                        <div class="avatar avatar-online ">
                                            @if (Auth::user()->profile_photo_path != null)
                                                <img src="{{ asset('storage/user/photo/'.Auth::user()->profile_photo_path) }}" alt class="w-px-40 h-px-40 rounded-circle" />
                                            @else
                                                <img src="{{ asset('assets/img/avatars/user.jpg') }}" alt class="w-px-40 h-px-40 rounded-circle" />
                                            @endif
                                        </div>
                                    </div>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end toast-verifikasi">
                                    @if (Auth::user() -> level == 'admin')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('dashboard-admin.index') }}">
                                            <iconify-icon icon="bx:home-circle" class="bx me-2"></iconify-icon>
                                            <span class="align-middle">Beranda Admin</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                      <a class="dropdown-item" href="{{ route('myprofileanggota') }}">
                                        <iconify-icon icon="bx:user" class="bx me-2"></iconify-icon>
                                        <span class="align-middle">Profil Saya</span>
                                      </a>
                                    </li>
                                    @if (Auth::user() -> level == 'anggota')
                                        @if (Auth::user() -> anggota -> verifikasi != 'Terverifikasi')
                                            <li>
                                                <a class="dropdown-item btn-checkverif" href="#">
                                                    <iconify-icon icon="bx:history" class="me-2 bx"></iconify-icon>
                                                    <span class="align-middle">Riwayat Peminjaman</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item btn-checkverif" href="#">
                                                    <iconify-icon icon="bxs:data" class="me-2 bx"></iconify-icon>
                                                    <span class="align-middle">Donasi/Repository</span>
                                                </a>
                                            </li>
                                            {{-- <li>
                                                <a class="dropdown-item btn-checkverif" href="#">
                                                    <iconify-icon icon="bxs:key" class="me-2 bx"></iconify-icon>
                                                    <span class="align-middle">Pinjam Loker</span>
                                                </a>
                                            </li> --}}
                                        @else
                                            <li>
                                                <a class="dropdown-item" href="{{ route('history.index') }}">
                                                <iconify-icon icon="bx:history" class="me-2 bx"></iconify-icon>
                                                <span class="align-middle">Riwayat Peminjaman</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('donasibuku.index') }}">
                                                <iconify-icon icon="bxs:data" class="me-2 bx"></iconify-icon>
                                                <span class="align-middle">Donasi/Repository</span>
                                                </a>
                                            </li>
                                            {{-- <li>
                                                <a class="dropdown-item" href="#">
                                                <iconify-icon icon="bxs:key" class="me-2 bx"></iconify-icon>
                                                <span class="align-middle">Pinjam Loker</span>
                                                </a>
                                            </li> --}}
                                        @endif
                                    @endif
                                    {{-- <li>
                                        <a class="dropdown-item" href="{{ route('myprofileanggota') }}">
                                            <span class="d-flex align-items-center align-middle">
                                                <iconify-icon icon="bx:bell" class="me-2 flex-shrink-0 bx"></iconify-icon>
                                            <span class="flex-grow-1 align-middle">Notifikasi</span>
                                            <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                            </span>
                                        </a>
                                    </li> --}}
                                    <li>
                                      <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <iconify-icon icon="bx:power-off" class="me-2 bx"></iconify-icon>
                                        <span class="align-middle">Keluar</span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                      </a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="footer bg-light">
          <div
            class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3"
          >
            <div>
              <a
                href="https://ittelkom-sby.ac.id/"
                target="_blank"
                class="footer-text fw-bolder"
                >ITTelkom Surabaya</a
              >
              ©
            </div>
            <div>
            </div>
          </div>
        </footer>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function (reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.2/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('assets/anggota/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/anggota/js/popper.js') }}"></script>
    <script src="{{ asset('assets/anggota/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/anggota/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/anggota/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Sweet alert verifikasi
            $(".toast-verifikasi").on("click", ".btn-checkverif", function (e) {
                e.preventDefault();

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    width: '400px',
                    background: '#ff3e1d',
                    color: '#ededed',
                    timer: 8000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    title: "Maaf Anda Belum Terverifikasi",
                    icon: "warning",
                });
            });
        });
    </script>
    @include('sweetalert::alert')
    @yield('script')
  </body>
</html>
