@extends('layout.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">Peminjaman Buku/</span> Tambah Peminjam</h5>
        </div>
    </div>

    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('booking-admin.store') }}" method="POST" enctype="multipart/form-data" id="katalogForm">
              @csrf
              <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Judul Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:book"></iconify-icon>
                        </span>
                        <select class="form-select judul_buku @error('judul_buku') is-invalid @enderror" id="judul_buku" name="judul_buku">
                            <option value=""></option>
                            @foreach ($buku as $buku)
                                <option value="{{ $buku->id}}">{{ $buku->kode_buku }} - {{ $buku->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="judul_buku-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Jenis Identitas
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:id-card"></iconify-icon>
                        </span>
                        <select class="form-select jenis_identitas @error('jenis_identitas') is-invalid @enderror" id="jenis_identitas" name="jenis_identitas">
                            <option value=""></option>
                            <option value="KTP">KTP</option>
                            <option value="Kartu Pegawai / KTM">Kartu Pegawai / KTM</option>
                            <option value="SIM">SIM</option>
                            <option value="Passport">Passport</option>
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="jenis_identitas-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nomor Identitas
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bx:hash"></iconify-icon>
                        </span>
                        <input
                            id="nomor_identitas"
                            type="text"
                            class="form-control @error('nomor_identitas') is-invalid @enderror"
                            name="nomor_identitas"
                            value="{{ old('nomor_identitas') }}"
                            placeholder="Enter ID Number"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="nomor_identitas-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Lengkap
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:user"></iconify-icon>
                        </span>
                        <select class="form-select nama_lengkap @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap">
                            <option value=""></option>
                            @foreach ($anggota as $anggota)
                                <option value="{{ $anggota->id}}">{{ $anggota->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="nama_lengkap-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
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
                            placeholder="Email User"
                            aria-describedby="basic-addon13"
                            readonly
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="email-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nomor Handphone
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bx:phone"></iconify-icon>
                        </span>
                        <input
                            id="no_hp"
                            type="text"
                            class="form-control @error('no_hp') is-invalid @enderror"
                            name="no_hp"
                            value="{{ old('no_hp') }}"
                            placeholder="08581xxxxxxx"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="no_hp-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Alamat Lengkap
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bx:map-pin"></iconify-icon>
                        </span>
                        <input
                            id="address"
                            type="text"
                            class="form-control @error('address') is-invalid @enderror"
                            name="address"
                            value="{{ old('address') }}"
                            placeholder="Enter The Address According To The ID Number"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="address-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Tanggal Pinjam
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:calendar"></iconify-icon>
                        </span>
                        <input
                            name="tgl_pinjam"
                            class="form-control"
                            type="date"
                            id="tgl_pinjam"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="tgl_pinjam-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Batas Peminjaman
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:calendar"></iconify-icon>
                        </span>
                        <input
                          class="form-control"
                          type="date"
                          id="batas_pinjam"
                          name="batas_pinjam"
                          placeholder="Deadline"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="batas_pinjam-errorMsg"></span>
                    </div>
                </div>
              </div>
              <div class="row justify-content-left mt-3">
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <a class="btn btn-danger" data-toggle="tooltip" href="{{ route('booking-admin.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
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
    <script src="{{ asset('assets/js/validate-buku.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#judul_buku").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });
        });

        $(document).ready(function () {
            $("#jenis_identitas").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });
        });

        $(document).ready(function () {
            $("#nama_lengkap").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });
        });

        $('#nama_lengkap').on('change',function(){
            var nama = $(this).find('option:selected').val();

            $.ajax({
                url: '/getUser/'+nama,
                type: "GET",
                dataType: "json",
                success: function(user){
                    $.each(user, function(index, inisial){
                        document.getElementById("email").value = inisial.email;
                    })
                }
            });

            $.ajax({
                url: '/getAnggota/'+nama,
                type: "GET",
                dataType: "json",
                success: function(anggota){
                    $.each(anggota, function(key, value){
                        document.getElementById("no_hp").value = value.no_hp;
                        document.getElementById("address").value = value.alamat;
                    })
                }
            });
        });

        $('#judul_buku').on('change',function(){
            var buku = $(this).find('option:selected').val();
            var datestring = "2010-09-11";
            var myDate = new Date(datestring);

            myDate.setDate(myDate.getDate()+7);

            $.ajax({
                url: '/getBuku/'+buku,
                type: "GET",
                dataType: "json",
                success: function(bukuku){
                    $.each(bukuku, function(k, v){
                        document.getElementById("batas_pinjam").value = myDate;
                    })
                }
            });
        });
    </script>
@endsection
