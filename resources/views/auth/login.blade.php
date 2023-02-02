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
                                            <iconify-icon icon="bxs:user"></iconify-icon>
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
                                <div class="form-password-toggle mb-3">
                                    <label class="form-label" for="basic-default-password12">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:lock-alt"></iconify-icon>
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
                                            <iconify-icon icon="bx:hide"></iconify-icon>
                                        </span>
                                    </div>
                                    @error('password')
                                        <div id="defaultFormControlHelp" class="form-text text-danger">
                                            Please Enter Your Password
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <div class="d-grid gap-2 col-lg-12 mx-auto">
                                        <button class="btn btn-danger btn-lg" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      <div class="tab-pane fade" id="navs-justified-register" role="tabpanel">
                        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" id="registerForm">
                            @csrf
                            <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">
                                    Nama Lengkap
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">
                                        <iconify-icon icon="bxs:user"></iconify-icon>
                                    </span>
                                    <input
                                        id="fullname"
                                        type="text"
                                        class="form-control @error('fullname') is-invalid @enderror"
                                        name="fullname"
                                        placeholder="Your Full Name"
                                        aria-describedby="basic-addon13"
                                        value="{{ old('fullname')}}"
                                        autocomplete="fullname"
                                    />
                                </div>
                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                    <span class="errorTxt" id="fullname-errorMsg"></span>
                                </div>
                            </div>
                            <div class="form-password-toggle mb-3">
                                <label class="form-label" for="basic-default-password12">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">
                                        <iconify-icon icon="bxs:lock-alt"></iconify-icon>
                                    </span>
                                    <input
                                        id="bxs-lock-alt"
                                        type="password"
                                        class="form-control @error('password_register') is-invalid @enderror"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="basic-default-password2"
                                        name="password_register"
                                        value="{{ old('password_register')}}"
                                        autocomplete="current-password"
                                    />
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                        <iconify-icon icon="bx:hide"></iconify-icon>
                                    </span>
                                </div>
                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                    <span class="errorTxt" id="password_register-errorMsg"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">
                                    Email
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">
                                        <iconify-icon icon="bx:at"></iconify-icon>
                                    </span>
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        placeholder="name@example.com"
                                        aria-describedby="basic-addon13"
                                        autocomplete="email"
                                    />
                                </div>
                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                    <span class="errorTxt" id="email-errorMsg"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">
                                    Nomor Handphone
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">
                                        <iconify-icon icon="bxs:phone"></iconify-icon>
                                    </span>
                                    <input
                                        id="telp"
                                        type="tel"
                                        class="form-control @error('telp') is-invalid @enderror"
                                        name="telp"
                                        placeholder="08xxxxxxxxxx"
                                        aria-describedby="basic-addon13"
                                        value="{{ old('telp')}}"
                                        autocomplete="tel-national"
                                    />
                                </div>
                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                    <span class="errorTxt" id="telp-errorMsg"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">
                                    Alamat
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">
                                        <iconify-icon icon="bxs:home"></iconify-icon>
                                    </span>
                                    <input
                                        id="address"
                                        type="text"
                                        class="form-control @error('address') is-invalid @enderror"
                                        name="address"
                                        placeholder="Your Address"
                                        aria-describedby="basic-addon13"
                                        value="{{ old('address')}}"
                                        autocomplete="address-line1"
                                    />
                                </div>
                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                    <span class="errorTxt" id="address-errorMsg"></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">
                                    Jenis Keanggotaan
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">
                                        <iconify-icon icon="bxs:user"></iconify-icon>
                                    </span>
                                    <select class="form-select jenisanggota @error('jenisanggota') is-invalid @enderror" id="jenisanggota" name="jenisanggota">
                                        <option value=""></option>
                                        @foreach ($jenis_keanggotaan as $jenisanggota)
                                            <option value="{{ $jenisanggota->id}}">{{ $jenisanggota->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                    <span class="errorTxt" id="jenisanggota-errorMsg"></span>
                                </div>
                            </div>
                            @foreach ($jenis_keanggotaan as $jenisanggota)
                                <div class="some" id="some_{{ $jenisanggota->id }}" style="display: none;">
                                    @if ($jenisanggota->role_institusi == 1)
                                        <div class="mb-3">
                                            <label for="defaultFormControlInput" class="form-label">
                                                Nama Institusi
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon11">
                                                    <iconify-icon icon="bxs:buildings"></iconify-icon>
                                                </span>
                                                <select class="form-select namainstitusi @error('namainstitusi') is-invalid @enderror" id="namainstitusi_{{ $jenisanggota->id }}" name="namainstitusi_{{ $jenisanggota->id }}">
                                                    <option value=""></option>

                                                </select>
                                            </div>
                                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                                <span class="errorTxt" id="namainstitusi_{{ $jenisanggota->id }}-errorMsg"></span>
                                            </div>
                                        </div>
                                        <div class="addinstitusi" id="addinstitusi" style="display: none;">
                                            <div class="mb-3">
                                                <label for="defaultFormControlInput" class="form-label">
                                                    Tambah Nama Institusi
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon11">
                                                        <iconify-icon icon="bxs:buildings"></iconify-icon>
                                                    </span>
                                                    <input
                                                        id="tambahinstitusi_{{ $jenisanggota->id }}"
                                                        type="text"
                                                        class="form-control @error('tambahinstitusi') is-invalid @enderror"
                                                        name="tambahinstitusi_{{ $jenisanggota->id }}"
                                                        placeholder="Add Your Institution"
                                                        aria-describedby="basic-addon13"
                                                    />
                                                </div>
                                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                                    <span class="errorTxt" id="tambahinstitusi_{{ $jenisanggota->id }}-errorMsg"></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($jenisanggota->role_user == 1)
                                        <div class="mb-3">
                                            <label for="defaultFormControlInput" class="form-label">
                                                Fakultas
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon11">
                                                    <iconify-icon icon="bxs:graduation"></iconify-icon>
                                                </span>
                                                <select class="form-select fakultas @error('jenisanggota') is-invalid @enderror" id="fakultas_{{ $jenisanggota->id }}" name="fakultas_{{ $jenisanggota->id }}">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                                <span class="errorTxt" id="fakultas_{{ $jenisanggota->id }}-errorMsg"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="defaultFormControlInput" class="form-label">
                                                Program Studi
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon11">
                                                    <iconify-icon icon="bxs:graduation"></iconify-icon>
                                                </span>
                                                <select class="form-select jurusan @error('jenisanggota') is-invalid @enderror" id="jurusan_{{ $jenisanggota->id }}" name="jurusan_{{ $jenisanggota->id }}">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                                <span class="errorTxt" id="jurusan_{{ $jenisanggota->id }}-errorMsg"></span>
                                            </div>
                                        </div>
                                    @endif
                                        <div class="mb-3">
                                            <label for="defaultFormControlInput" class="form-label">
                                                Photo Profile
                                            </label>
                                            <div id="defaultFormControlHelp" class="form-text mb-2" style="margin-top:  -3px;">
                                                <span>Masukkan Foto yang Jelas Tanpa Ada yang Menutupi Muka</span>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon11">
                                                    <iconify-icon icon="bxs:id-card"></iconify-icon>
                                                </span>
                                                <input class="form-control" type="file" id="photo_{{ $jenisanggota->id }}" name="photo_{{ $jenisanggota->id }}" />
                                            </div>
                                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                                <span class="errorTxt" id="photo_{{ $jenisanggota->id }}-errorMsg"></span>
                                            </div>
                                        </div>
                                    @if ($jenisanggota->role_ktp == 1)
                                        <div class="mb-3">
                                            <label for="defaultFormControlInput" class="form-label">
                                                KTP
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon11">
                                                    <iconify-icon icon="bxs:id-card"></iconify-icon>
                                                </span>
                                                <input class="form-control" type="file" id="filektp_{{ $jenisanggota->id }}" name="filektp_{{ $jenisanggota->id }}" />
                                            </div>
                                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                                <span class="errorTxt" id="filektp_{{ $jenisanggota->id }}-errorMsg"></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($jenisanggota->role_karpeg_ktm == 1)
                                        <div class="mb-3">
                                            <label for="defaultFormControlInput" class="form-label">
                                                Kartu Pegawai/KTM
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon11">
                                                    <iconify-icon icon="bxs:id-card"></iconify-icon>
                                                </span>
                                                <input class="form-control" type="file" id="filekarpegktm_{{ $jenisanggota->id }}" name="filekarpegktm_{{ $jenisanggota->id }}" />
                                            </div>
                                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                                <span class="errorTxt" id="filekarpegktm_{{ $jenisanggota->id }}-errorMsg"></span>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($jenisanggota->role_ijazah == 1)
                                        <div class="mb-3">
                                            <label for="defaultFormControlInput" class="form-label">
                                                Ijazah
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon11">
                                                    <iconify-icon icon="bxs:file"></iconify-icon>
                                                </span>
                                                <input class="form-control" type="file" id="fileijazah_{{ $jenisanggota->id }}" name="fileijazah_{{ $jenisanggota->id }}" />
                                            </div>
                                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                                <span class="errorTxt" id="fileijazah_{{ $jenisanggota->id }}-errorMsg"></span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            <div class="mt-4">
                                <div class="d-grid gap-2 col-lg-12 mx-auto">
                                    <button class="btn btn-danger btn-lg" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
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
    @include('sweetalert::alert')

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.2/dist/iconify-icon.min.js"></script>

    <!-- AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- JS untuk Validation -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
    <script src="{{ asset('assets/js/validate.js') }}"></script>

    <!-- Dropdown -->
    <script>
        $(document).ready(function () {

            $("#jenisanggota").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $('#jenisanggota').on('change',function(){
                $(".some").hide();
                var some = $(this).find('option:selected').val();
                /* console.log(some); */
                $("#some_" + some).show();

                $("#namainstitusi_" + some).show().select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#fakultas_" + some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#jurusan_" + some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $.ajax({
                    url: '/getJenisAnggota/'+some,
                    type: "GET",
                    dataType: "json",
                    success: function(anggota){
                        $.ajax({
                            url: '/getInstitusi/'+some,
                            type: "GET",
                            dataType: "json",
                            success: function(data){
                                $('select[name="namainstitusi_'+ some +'"]').empty();
                                $('select[name="namainstitusi_'+ some +'"]').append('<option value="">Please Select</option>');
                                $.each(anggota, function(index, nama){
                                    if(nama.role_add_institusi){
                                        $('select[name="namainstitusi_'+ some +'"]').append('<option value="add">Add Your Institution</option>');
                                    }
                                })
                                $.each(data, function(key, value){
                                    $('select[name="namainstitusi_'+ some +'"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                                });
                            }
                        });
                    }
                });

                $.ajax({
                    url: '/getFakultas/',
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('select[name="fakultas_'+ some +'"]').empty();
                        $('select[name="fakultas_'+ some +'"]').append('<option value="">Please Select</option>');
                        $.each(data, function(key, value){
                            $('select[name="fakultas_'+ some +'"]').append('<option value="'+ value.kode_fakultas +'">'+ value.nama +'</option>');
                        });
                    }
                });

                $.ajax({
                    url: '/getProdi/',
                    type: "GET",
                    dataType: "json",
                    success: function(data){
                        $('select[name="jurusan_'+ some +'"]').empty();
                        $('select[name="jurusan_'+ some +'"]').append('<option value="">Please Select</option>');
                        $.each(data, function(key, value){
                            $('select[name="jurusan_'+ some +'"]').append('<option value="'+ value.nama +'">'+ value.nama +'</option>');
                        });
                    }
                });
            });

            $('.namainstitusi').on('change',function(){
                $(".addinstitusi").hide();
                var target = $(this).find('option:selected').val();
                /* console.log(target); */
                if (target == 'add'){
                    $("#addinstitusi").show();
                };
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
