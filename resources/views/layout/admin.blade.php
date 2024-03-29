<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ $pageTitle }}</title>

    <meta name="description" content="" />

    <!-- Progressive Web App -->

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
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-misc.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>

    <!-- Page CSS -->
    @yield('css')

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>

    @php
        $route = Route::currentRouteName();
    @endphp

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" style="margin-top: 20px; margin-bottom: 15px;">
            <a href="{{ route('dashboard-admin.index') }}" class="app-brand-link">
                <img src="{{ asset('assets/img/icons/logo/logo-putih.png') }}" alt style="height: 55px;" />
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <iconify-icon icon="bx:chevron-left" class="bx bx-sm align-middle"></iconify-icon>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item @if($route == 'dashboard-admin.index') active @endif">
              <a href="{{ route('dashboard-admin.index') }}" class="menu-link">
                <iconify-icon icon="bx:home-circle" class="menu-icon tf-icons bx"></iconify-icon>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-item @if($route == 'akuisisi-buku.index') active @endif">
                <a href="{{ route('akuisisi-buku.index') }}" class="menu-link">
                  <iconify-icon icon="bx:book-add" class="menu-icon tf-icons bx"></iconify-icon>
                  <div data-i18n="Analytics">Akuisisi Buku</div>
                </a>
            </li>

            <li class="menu-item {{  (request()->is('buku*')) ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <iconify-icon icon="bx:book" class="menu-icon tf-icons bx"></iconify-icon>
                <div data-i18n="Account Settings">Katalog Buku</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{  (request()->is('buku/catalog-admin*')) ? 'active' : '' }}">
                  <a href="{{ route('catalog-admin.index') }}" class="menu-link">
                    <div data-i18n="Account">Daftar Buku</div>
                  </a>
                </li>
                <li class="menu-item {{  (request()->is('buku/jenis-buku*')) ? 'active' : '' }}">
                  <a href="{{ route('jenis-buku.index') }}" class="menu-link">
                    <div data-i18n="Notifications">Jenis Buku</div>
                  </a>
                </li>
                <li class="menu-item {{  (request()->is('buku/koleksi-buku*')) ? 'active' : '' }}">
                    <a href="{{ route('koleksi-buku.index') }}" class="menu-link">
                      <div data-i18n="Notifications">Koleksi Buku</div>
                    </a>
                </li>
                <li class="menu-item {{  (request()->is('buku/sirkulasi*')) ? 'active' : '' }}">
                  <a href="{{ route('sirkulasi.index') }}" class="menu-link">
                    <div data-i18n="Notifications">Sirkulasi Buku</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item {{  (request()->is('user*')) ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <iconify-icon icon="bx:user" class="menu-icon tf-icons bx"></iconify-icon>
                <div data-i18n="Account Settings">Pengguna</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{  (request()->is('user/user-admin*')) ? 'active' : '' }}">
                  <a href="{{ route('user-admin.index') }}" class="menu-link">
                    <div data-i18n="Account">Daftar Pengguna</div>
                  </a>
                </li>
                <li class="menu-item {{  (request()->is('user/jenis-keanggotaan*')) ? 'active' : '' }}">
                  <a href="{{ route('jenis-keanggotaan.index') }}" class="menu-link">
                    <div data-i18n="Notifications">Jenis Keanggotaan</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item {{  (request()->is('admin/booking-admin*')) ? 'active' : '' }}">
              <a href="{{ route('booking-admin.index') }}" class="menu-link">
                <iconify-icon icon="bx:bookmark" class="menu-icon tf-icons bx"></iconify-icon>
                <div data-i18n="Analytics">Peminjaman Buku</div>
              </a>
            </li>

            <li class="menu-item {{  (request()->is('admin/donasi-admin*')) ? 'active' : '' }}">
              <a href="{{ route('donasi-admin.index') }}" class="menu-link">
                <iconify-icon icon="bx:donate-heart" class="menu-icon tf-icons bx"></iconify-icon>
                <div data-i18n="Analytics">Donasi Buku</div>
              </a>
            </li>

            <li class="menu-item {{  (request()->is('admin/information-admin*')) ? 'active' : '' }}">
              <a href="{{ route('information-admin.index') }}" class="menu-link">
                <iconify-icon icon="bx:news" class="menu-icon tf-icons bx"></iconify-icon>
                <div data-i18n="Analytics">Informasi Penting</div>
              </a>
            </li>

            <li class="menu-item {{  (request()->is('admin/akses-jurnal*')) ? 'active' : '' }}">
              <a href="{{ route('akses-jurnal.index') }}" class="menu-link">
                <iconify-icon icon="bx:link" class="menu-icon tf-icons bx"></iconify-icon>
                <div data-i18n="Analytics">Akses Jurnal</div>
              </a>
            </li>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme sticky-top"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <iconify-icon icon="bx:menu" class="bx bx-sm"></iconify-icon>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              @yield('search-navbar')
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="media align-items-center d-flex ">
                            <div class="media-body d-none d-lg-block f-grow-1 me-4">
                                <span class="fw-semibold d-block">{{ Auth::user() -> admin -> nama_lengkap }}</span>
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
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="{{ route('myprofile') }}">
                        <iconify-icon icon="bx:user" class="bx me-2"></iconify-icon>
                        <span class="align-middle">Profil Saya</span>
                      </a>
                    </li>
                    {{-- <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <iconify-icon icon="bx:bell" class="flex-shrink-0 bx me-2"></iconify-icon>
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
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            @yield('content')

            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">

                </div>
                <div>
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , support by
                  <a href="https://ittelkom-sby.ac.id/" target="_blank" class="footer-link fw-bolder">ITTelkom Surabaya</a>
                </div>
                <div class="mb-2 mb-md-0">

                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.2/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    @include('sweetalert::alert')

    <!-- Script -->
    @yield('script')
  </body>
</html>
