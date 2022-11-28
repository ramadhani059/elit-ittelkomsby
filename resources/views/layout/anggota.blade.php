<!doctype html>
<html lang="en">
  <head>
  	<title>Carousel 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

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
                        <a class="nav-link @if($route == 'home') fw-semibold active @endif" aria-current="page" href="javascript:void(0)">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{  (request()->is('/catalog*')) ? 'fw-semibold active' : '' }}" href="javascript:void(0)">Katalog</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">About Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Gallery</a>
                      </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <div class="media-body d-lg-block f-grow-1">
                                        <a class="btn btn-danger" href="{{ route('login') }}">Login / Register</a>
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
                                            <img src="{{ asset('assets/img/avatars/user.jpg') }}" alt class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
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
              <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
              <a href="javascript:void(0)" class="footer-link me-4">Help</a>
              <a href="javascript:void(0)" class="footer-link me-4">Contact</a>
              <a href="javascript:void(0)" class="footer-link">Terms &amp; Conditions</a>
            </div>
          </div>
        </footer>

    <script src="{{ asset('assets/anggota/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/anggota/js/popper.js') }}"></script>
    <script src="{{ asset('assets/anggota/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/anggota/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/anggota/js/main.js') }}"></script>
  </body>
</html>
