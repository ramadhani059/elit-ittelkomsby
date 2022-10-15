<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>ELIT ITTelkom Surabaya</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <style>
      body{
        background-image: url({{ asset('assets/img/backgrounds/DesainLoginWifiYangDIpakai.png') }});
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        height: 100%;
      }
    </style>

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Tabs -->

              <div class="row" style="padding-top: 50px; padding-bottom: 50px;">
                <div class="col-xl-4"></div>
                <div class="col-xl-4">
                  <div class="nav-align-top mb-6">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-login"
                          aria-controls="navs-justified-login"
                          aria-selected="true"
                        >
                          Login
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-register"
                          aria-controls="navs-justified-register"
                          aria-selected="false"
                        >
                          Register
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-justified-login" role="tabpanel">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Email
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-user"></i>
                                        </span>
                                        <input
                                            id="email"
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="name@example.com"
                                            aria-describedby="basic-addon13"
                                            required
                                            autocomplete="email"
                                            autofocus
                                        />
                                    </div>
                                    @error('email')
                                        <div id="defaultFormControlHelp" class="form-text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-password-toggle mb-4">
                                    <label class="form-label" for="basic-default-password12">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-lock-alt"></i>
                                        </span>
                                        <input
                                            id="password"
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="basic-default-password12"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password2"
                                            name="password"
                                            required
                                            autocomplete="current-password"
                                        />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <div id="defaultFormControlHelp" class="form-text text-danger">
                                            Please Enter Your Password
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <div class="d-grid gap-2 col-lg-12 mx-auto">
                                        <button class="btn btn-danger btn-lg" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      <div class="tab-pane fade" id="navs-justified-register" role="tabpanel">
                        <div class="mb-3">
                          <label for="defaultFormControlInput" class="form-label">
                            Nama Lengkap
                          </label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                              <i class="bx bxs-user"></i>
                            </span>
                            <input
                              type="email"
                              class="form-control"
                              placeholder="Your Full Name"
                              aria-describedby="basic-addon13"
                            />
                          </div>
                          <div id="defaultFormControlHelp" class="form-text text-danger">
                            Please Enter Your Full Name
                          </div>
                        </div>
                        <div class="form-password-toggle mb-3">
                          <label class="form-label" for="basic-default-password12">Password</label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                              <i class="bx bxs-lock-alt"></i>
                            </span>
                            <input
                              type="password"
                              class="form-control"
                              id="basic-default-password12"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              aria-describedby="basic-default-password2"
                            />
                            <span id="basic-default-password2" class="input-group-text cursor-pointer"
                              ><i class="bx bx-hide"></i
                            ></span>
                          </div>
                          <div id="defaultFormControlHelp" class="form-text text-danger">
                            Please Enter Your Password
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="defaultFormControlInput" class="form-label">
                            Nomor Handphone
                          </label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                              <i class="bx bxs-phone"></i>
                            </span>
                            <input
                              type="tel"
                              class="form-control"
                              placeholder="08xxxxxxxxxx"
                              aria-describedby="basic-addon13"
                            />
                          </div>
                          <div id="defaultFormControlHelp" class="form-text text-danger">
                            Please Enter Your Mobile Phone
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="defaultFormControlInput" class="form-label">
                            Alamat
                          </label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                              <i class="bx bxs-home"></i>
                            </span>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Your Address"
                              aria-describedby="basic-addon13"
                            />
                          </div>
                          <div id="defaultFormControlHelp" class="form-text text-danger">
                            Please Enter Your Address
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="defaultFormControlInput" class="form-label">
                            Jenis Keanggotaan
                          </label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                              <i class="bx bxs-user"></i>
                            </span>
                            <select class="form-select" id="kota" name="kota">
                              <option value=""></option>
                              <option value="1">Umum</option>
                              <option value="2">Alumni ITTelkom Surabaya</option>
                              <option value="3">Lemdikti YPT</option>
                              <option value="4">Perguruan Tinggi Asuh</option>
                            </select>
                          </div>
                          <div id="defaultFormControlHelp" class="form-text text-danger">
                            This Field is Required
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4"></div>
              </div>
              <!-- Tabs -->

            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- wajib jquery  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"></script>
    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#kota").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select"
            });
        });
    </script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
