@extends('layout.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">User/ List User/</span> Tambah User</h5>
        </div>
    </div>

    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('user-admin.store') }}" method="POST" enctype="multipart/form-data" id="registerForm">
              @csrf
              <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Lengkap
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-user"></i>
                        </span>
                        <input
                            id="fullname"
                            type="text"
                            class="form-control @error('fullname') is-invalid @enderror"
                            name="fullname"
                            value="{{ old('fullname') }}"
                            placeholder="Enter Your Full Name"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="fullname-errorMsg"></span>
                    </div>
                </div>
                <div class="form-password-toggle col-sm-6 mb-3">
                    <label class="form-label" for="basic-default-password12">Password</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-lock-alt"></i>
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
                            <i class="bx bx-hide"></i>
                        </span>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="password_register-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nomor Handphone
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-phone"></i>
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
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Alamat
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-home"></i>
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
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Level
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-user"></i>
                        </span>
                        <select class="form-select level @error('level') is-invalid @enderror" id="level" name="level">
                            <option value=""></option>
                            <option value="admin">Admin</option>
                            <option value="anggota">Anggota</option>
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="level-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 ruleleveladmin" id="ruleleveladmin" style="display: none;">
                    <label for="defaultFormControlInput" class="form-label">
                        Email Institusi
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-home"></i>
                        </span>
                        <input
                            id="emailadmin"
                            type="email"
                            class="form-control @error('emailadmin') is-invalid @enderror"
                            name="emailadmin"
                            placeholder="Enter Your Email"
                            aria-describedby="basic-addon13"
                            value="{{ old('emailadmin')}}"
                            autocomplete="address-line1"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="emailadmin-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 rulelevelanggota" id="rulelevelanggota" style="display: none;">
                    <label for="defaultFormControlInput" class="form-label">
                        Jenis Keanggotaan
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-user"></i>
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
              </div>
              @foreach ($jenis_keanggotaan as $jenisanggota)
                <div class="row some" id="some_{{ $jenisanggota->id }}" style="display: none;">
                    @if ($jenisanggota->role_institusi == 1)
                        <div class="col-sm-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Nama Institusi
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <i class="bx bxs-buildings"></i>
                                </span>
                                <select class="form-select namainstitusi @error('namainstitusi') is-invalid @enderror" id="namainstitusi_{{ $jenisanggota->id }}" name="namainstitusi_{{ $jenisanggota->id }}">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="namainstitusi_{{ $jenisanggota->id }}-errorMsg"></span>
                            </div>
                        </div>
                        <div class="addinstitusi col-sm-6 mb-3" id="addinstitusi" style="display: none;">
                            <label for="defaultFormControlInput" class="form-label">
                                Tambah Nama Institusi
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <i class="bx bxs-buildings"></i>
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
                    @endif
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Email Institusi
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bx-at"></i>
                            </span>
                            <input
                                id="email_register_{{ $jenisanggota->id }}"
                                type="email"
                                class="form-control @error('email_register') is-invalid @enderror"
                                name="email_register_{{ $jenisanggota->id }}"
                                placeholder="name@example.com"
                                aria-describedby="basic-addon13"
                                autocomplete="email"
                            />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="email_register_{{ $jenisanggota->id }}-errorMsg"></span>
                        </div>
                    </div>
                </div>
              @endforeach
              <div class="row dokumenleveladmin" id="dokumenleveladmin" style="display: none;">
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        KTP
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-id-card"></i>
                        </span>
                        <input class="form-control" type="file" id="filektp_admin" name="filektp_admin" />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="filektp_admin-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Karpeg/KTM
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-id-card"></i>
                        </span>
                        <input class="form-control" type="file" id="filekarpegktm_admin" name="filekarpegktm_admin" />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="filekarpegktm_admin-errorMsg"></span>
                    </div>
                </div>
              </div>
              <div class="row justify-content-left mt-3">
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <a class="btn btn-danger" data-toggle="tooltip" href="{{ route('user-admin.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
                        Cancel
                    </a>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
    <!-- Basic with Icons -->
</div>

@endsection

@section('script')
    <!-- AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- JS untuk Validation -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
    <script src="{{ asset('assets/js/validate.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#level").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $('#level').on('change',function(){
                $(".ruleleveladmin").hide();
                $(".rulelevelanggota").hide();
                $(".dokumenleveladmin").hide();
                var targetlevel = $(this).find('option:selected').val();
                if(targetlevel == 'admin'){
                    $(".some").hide();
                    $("#ruleleveladmin").show();
                    $("#dokumenleveladmin").show();
                } else {
                    $("#rulelevelanggota").show();
                }
            });

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
@endsection
