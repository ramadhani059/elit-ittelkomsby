@extends('layout.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">User/ Jenis Keanggotaan/</span> Edit Jenis Keanggotaan</h5>
        </div>
    </div>

    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('jenis-keanggotaan.update', ['jenis_keanggotaan' => $jenisanggota->id]) }}" method="POST" enctype="multipart/form-data" id="registerForm">
              @csrf
              @method('put')
              <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Jenis Keanggotaan
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:user"></iconify-icon>
                        </span>
                        <input
                            id="namajeniskeanggotaan"
                            type="text"
                            class="form-control @error('namajeniskeanggotaan') is-invalid @enderror"
                            name="namajeniskeanggotaan"
                            value="{{ $jenisanggota->nama }}"
                            placeholder="Enter The Membership Type"
                            aria-describedby="basic-addon13"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="namajeniskeanggotaan-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Batas Peminjaman Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:calendar"></iconify-icon>
                        </span>
                        <input
                            id="bataspeminjaman"
                            type="text"
                            class="form-control @error('bataspeminjaman') is-invalid @enderror"
                            name="bataspeminjaman"
                            value="{{ $jenisanggota->batas_booking }}"
                            placeholder="Enter The Limit For Borrowing Books"
                            aria-describedby="basic-addon13"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="bataspeminjaman-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Jumlah Peminjaman Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:book"></iconify-icon>
                        </span>
                        <input
                            id="jumlahpinjam"
                            type="text"
                            class="form-control @error('jumlahpinjam') is-invalid @enderror"
                            name="jumlahpinjam"
                            value="{{ $jenisanggota->jumlah_pinjam }}"
                            placeholder="Enter The Loan Amount"
                            aria-describedby="basic-addon13"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="jumlahpinjam-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Status User
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:user"></iconify-icon>
                        </span>
                        <select class="form-select statususer @error('statususer') is-invalid @enderror" id="statususer" name="statususer">
                            <option value=""></option>
                            @if ($jenisanggota->role_user == 1)
                                <option value=0>Non Mahasiswa</option>
                                <option value=1 {{ $jenisanggota->role_user == 1 ? 'selected' : '' }}>Mahasiswa</option>
                            @else
                                <option value=0 {{ $jenisanggota->role_user == 0 ? 'selected' : '' }}>Non Mahasiswa</option>
                                <option value=1>Mahasiswa</option>
                            @endif
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="statususer-errorMsg"></span>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Hak Istimewa (Privileged)
                    </label>
                    <div class="col-sm-6 form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="role_download" @if ($jenisanggota->role_download == 1) checked @endif />
                        <label class="form-check-label" for="defaultCheck1"> Download File </label>
                    </div>
                    <div class="col-sm-6 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="role_baca" @if ($jenisanggota->role_baca == 1) checked @endif/>
                        <label class="form-check-label" for="defaultCheck1"> Membaca File </label>
                    </div>
                    <div class="col-sm-6 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="role_booking" @if ($jenisanggota->role_booking == 1) checked @endif/>
                        <label class="form-check-label" for="defaultCheck1"> Meminjam Buku </label>
                    </div>
                    <div class="col-sm-6 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="role_institusi" @if ($jenisanggota->role_institusi == 1) checked @endif/>
                        <label class="form-check-label" for="defaultCheck1"> Memilih Institusi </label>
                    </div>
                    <div class="col-sm-6 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="role_add_institusi" @if ($jenisanggota->role_add_institusi == 1) checked @endif/>
                        <label class="form-check-label" for="defaultCheck1"> Menambah Institusi </label>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Dokumen Persyaratan
                    </label>
                    <div class="col-sm-6 form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="role_ktp" @if ($jenisanggota->role_ktp == 1) checked @endif/>
                        <label class="form-check-label" for="defaultCheck1"> KTP </label>
                    </div>
                    <div class="col-sm-6 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="role_karpeg_ktm" @if ($jenisanggota->role_karpeg_ktm == 1) checked @endif/>
                        <label class="form-check-label" for="defaultCheck1"> Kartu Pegawai/KTM </label>
                    </div>
                    <div class="col-sm-6 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="role_ijazah" @if ($jenisanggota->role_ijazah == 1) checked @endif/>
                        <label class="form-check-label" for="defaultCheck1"> Ijazah </label>
                    </div>
                </div>
              </div>
              <div class="row justify-content-left mt-3">
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <a class="btn btn-danger" data-toggle="tooltip" href="{{ route('jenis-keanggotaan.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
    <script src="{{ asset('assets/js/validate.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#statususer").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });
        });
    </script>
@endsection
