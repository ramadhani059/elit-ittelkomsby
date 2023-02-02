@extends('layout.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div
      class="bs-toast toast toast-placement-ex m-2 bg-danger top-0 end-0"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
      data-delay="2000"
      id="custom-target"
    >
      <div class="toast-header">
        <iconify-icon icon="bx:bell" class="me-2"></iconify-icon>
        <div class="me-auto fw-semibold">Information</div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">Kode Buku yang Anda Masukkan Belum Terdaftar</div>
    </div>

    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('donasi-admin.update', ['donasi_admin' => $donasi->id]) }}" method="POST" enctype="multipart/form-data" id="katalogForm">
              @csrf
              @method('put')
              <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Jenis Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:book-alt"></iconify-icon>
                        </span>
                        <select class="form-select jenis_buku @error('jenis_buku') is-invalid @enderror" id="jenis_buku" name="jenis_buku">
                            <option value=""></option>
                            @foreach ($jenisbuku as $jenis_buku)
                                <option value="{{ $jenis_buku->id}}" {{ $donasi->jenis_buku->id == $jenis_buku->id ? 'selected' : '' }}>{{ $jenis_buku->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="jenis_buku-errorMsg"></span>
                    </div>
                </div>
              </div>
              @foreach ($jenisbuku as $jenis_buku)
                <div class="some" id="some_{{ $jenis_buku->id}}" style="display: none;">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Kode Buku
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bx:hash"></iconify-icon>
                                </span>
                                <input
                                    id="kode_buku_{{ $jenis_buku->id}}"
                                    type="text"
                                    class="form-control @error('kode_buku_{{ $jenis_buku->id}}') is-invalid @enderror"
                                    name="kode_buku_{{ $jenis_buku->id}}"
                                    placeholder="01.04.2238"
                                    aria-describedby="basic-addon13"
                                    required
                                    autofocus
                                />
                                <a
                                    class="btn btn-outline-primary"
                                    id="checkkodebuku_{{ $jenis_buku->id}}"
                                    data-bs-toggle="tooltip"
                                    data-bs-offset="0,4"
                                    data-bs-placement="left"
                                    data-bs-html="true"
                                    title="<span>Check Kode Buku</span>"
                                >
                                    <iconify-icon icon="bx:search-alt-2" class="bx"></iconify-icon>
                                </a>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="kode_buku_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        @foreach ($jenis_buku->file_place as $field)
                            @if($field->nama == 'ISBN' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        ISBN
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bx:hash"></iconify-icon>
                                        </span>
                                        <input
                                            id="isbn_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('isbn_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="isbn_{{ $jenis_buku->id}}"
                                            placeholder="Enter ISBN"
                                            aria-describedby="basic-addon13"
                                            value="{{ $donasi->isbn }}"
                                            required
                                            autofocus
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="isbn_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                            @if($field->nama == 'Lokasi Buku' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Lokasi Buku
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:bar-chart-alt-2"></iconify-icon>
                                        </span>
                                        <input
                                            id="lokasi_buku_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('lokasi_buku_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="lokasi_buku_{{ $jenis_buku->id}}"
                                            placeholder="R. X.XX"
                                            aria-describedby="basic-addon13"
                                            required
                                            autofocus
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="lokasi_buku_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-sm-12 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Judul Buku
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                </span>
                                <input
                                    id="judul_buku_{{ $jenis_buku->id}}"
                                    type="text"
                                    class="form-control @error('judul_buku_{{ $jenis_buku->id}}') is-invalid @enderror"
                                    name="judul_buku_{{ $jenis_buku->id}}"
                                    placeholder="Enter Your Book Title "
                                    aria-describedby="basic-addon13"
                                    value="{{ $donasi->judul }}"
                                    required
                                    autofocus
                                />
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="judul_buku_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        @foreach ($jenis_buku->file_place as $field)
                            @if($field->nama == 'Judul Buku Inggris' && $field->tipe == 'text')
                                <div class="col-sm-12 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Judul Buku (Bahasa Inggris)
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                        </span>
                                        <input
                                            id="judul_buku_inggris_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('judul_buku_inggris_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="judul_buku_inggris_{{ $jenis_buku->id}}"
                                            placeholder="Enter Your Book Title in English Language "
                                            aria-describedby="basic-addon13"
                                            value="{{ $donasi->judul_inggris }}"
                                            required
                                            autofocus
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="judul_buku_inggris_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                            @if($field->nama == 'Anak Judul' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Anak Judul
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                        </span>
                                        <input
                                            id="anak_judul_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('anak_judul_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="anak_judul_{{ $jenis_buku->id}}"
                                            placeholder="Enter Your Book Title "
                                            aria-describedby="basic-addon13"
                                            value="{{ $donasi->anak_judul }}"
                                            required
                                            autofocus
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="anak_judul_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                            @if($field->nama == 'Edisi' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Edisi
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                        </span>
                                        <input
                                            id="edisi_buku_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('edisi_buku_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="edisi_buku_{{ $jenis_buku->id}}"
                                            placeholder="Enter Your Book Edition "
                                            aria-describedby="basic-addon13"
                                            value="{{ $donasi->edisi }}"
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="edisi_buku_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-sm-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Jenis Pengadaan
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                </span>
                                <select class="form-select jenis_pengadaan @error('jenis_pengadaan_{{ $jenis_buku->id}}') is-invalid @enderror" id="jenis_pengadaan_{{ $jenis_buku->id}}" name="jenis_pengadaan_{{ $jenis_buku->id}}">
                                    <option value=""></option>
                                    <option value="pembelian">Pembelian</option>
                                    <option value="hibah/donasi">Hibah/Donasi</option>
                                    <option value="repository">Repository</option>
                                </select>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="jenis_pengadaan_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Status Pengadaan
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:check-circle"></iconify-icon>
                                </span>
                                <select class="form-select status_pengadaan @error('status_pengadaan_{{ $jenis_buku->id}}') is-invalid @enderror" id="status_pengadaan_{{ $jenis_buku->id}}" name="status_pengadaan_{{ $jenis_buku->id}}">
                                    <option value=""></option>
                                    <option value="dapat dipinjam">Dapat Dipinjam</option>
                                    <option value="tidak dapat dipinjam">Tidak Dapat Dipinjam</option>
                                </select>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="status_pengadaan_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        @foreach ($jenis_buku->file_place as $field)
                            @if($field->nama == 'Ilustrasi' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Ilustrasi
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                        </span>
                                        <input
                                            id="ilustrasi_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('ilustrasi_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="ilustrasi_{{ $jenis_buku->id}}"
                                            placeholder="Enter Your Book Illustration "
                                            aria-describedby="basic-addon13"
                                            value="{{ $donasi->ilustrasi }}"
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="ilustrasi_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                            @if($field->nama == 'Dimensi Buku' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Dimensi Buku
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                        </span>
                                        <input
                                            id="dimensi_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('dimensi_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="dimensi_{{ $jenis_buku->id}}"
                                            placeholder="Enter Your Book Dimension "
                                            aria-describedby="basic-addon13"
                                            value="{{ $donasi->dimensi }}"
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="dimensi_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                            @if($field->nama == 'Program Studi' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Fakultas
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:graduation"></iconify-icon>
                                        </span>
                                        <select class="form-select fakultas @error('fakultas_{{ $jenis_buku->id}}') is-invalid @enderror" id="fakultas_{{ $jenis_buku->id}}" name="fakultas_{{ $jenis_buku->id}}">
                                            <option value=""></option>
                                            @foreach ($fakultas as $fakultas_itts)
                                                <option value="{{ $fakultas_itts->id }}" {{ $donasi->prodi->fakultas->id == $fakultas_itts->id ? 'selected' : '' }}>{{ $fakultas_itts->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="fakultas_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Program Studi
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:graduation"></iconify-icon>
                                        </span>
                                        <select class="form-select prodi @error('prodi_{{ $jenis_buku->id}}') is-invalid @enderror" id="prodi_{{ $jenis_buku->id}}" name="prodi_{{ $jenis_buku->id}}">
                                            <option value=""></option>
                                            @foreach ($prodi as $jurusan)
                                                <option value="{{ $jurusan->id }}" {{ $donasi->prodi->id == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="prodi_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-sm-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Jumlah Eksemplar
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                </span>
                                <input
                                    id="jumlah_eksemplar_{{ $jenis_buku->id}}"
                                    type="text"
                                    class="form-control @error('jumlah_eksemplar_{{ $jenis_buku->id}}') is-invalid @enderror"
                                    name="jumlah_eksemplar_{{ $jenis_buku->id}}"
                                    value="{{ $donasi->jml_eksemplar }}"
                                    placeholder="0 Book"
                                    aria-describedby="basic-addon13"
                                    required
                                    autofocus
                                />
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="jumlah_eksemplar_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Kota Terbit
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:buildings"></iconify-icon>
                                </span>
                                <input
                                    id="kota_terbit_{{ $jenis_buku->id}}"
                                    type="text"
                                    class="form-control @error('kota_terbit_{{ $jenis_buku->id}}') is-invalid @enderror"
                                    name="kota_terbit_{{ $jenis_buku->id}}"
                                    placeholder="Surabaya"
                                    aria-describedby="basic-addon13"
                                    value="{{ $donasi->kota_terbit }}"
                                    required
                                    autofocus
                                />
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="kota_terbit_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Tahun Terbit
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:calendar"></iconify-icon>
                                </span>
                                <input
                                    id="tahun_terbit_{{ $jenis_buku->id}}"
                                    type="text"
                                    class="form-control @error('tahun_terbit_{{ $jenis_buku->id}}') is-invalid @enderror"
                                    name="tahun_terbit_{{ $jenis_buku->id}}"
                                    placeholder="20XX"
                                    aria-describedby="basic-addon13"
                                    value="{{ $donasi->tahun_terbit }}"
                                    required
                                    autofocus
                                />
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="tahun_terbit_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-10 col-lg-11">
                                <label for="defaultFormControlInput" class="form-label"> Nama Subjek </label>
                            </div>
                        </div>
                        @foreach ($donasi->subjek_place as $subjek)
                            <div class="subjek_exist_wrapper_{{ $jenis_buku->id}}" id="subjek_exist_wrapper_{{ $jenis_buku->id}}">
                                <div class="row">
                                    <div class="col-10 col-lg-11 mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon11">
                                                <iconify-icon icon="bxs:user"></iconify-icon>
                                            </span>
                                            <input value="{{ $subjek->nama }}" id="subjek_{{ $jenis_buku->id}}" name="subjek_{{ $jenis_buku->id}}[]" type="text" class="form-control " aria-describedby="basic-addon13" readonly />
                                        </div>
                                    </div>
                                    <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_">
                                        <a class="btn btn-icon btn-danger remove_subjek_exist_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">
                                            <span><iconify-icon icon="bxs:trash" class="tf-icons bx"></iconify-icon></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="subjek_wrapper_{{ $jenis_buku->id}}">

                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label"> No Identitas / NIM </label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label"> Nama Depan Pengarang </label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div>
                                    <label for="defaultFormControlInput" class="form-label"> Nama Belakang Pengarang </label>
                                </div>
                            </div>
                        </div>
                        @foreach ($donasi->pengarang_place as $pengarang)
                            <div class="pengarang_exist_wrapper_{{ $jenis_buku->id}}" id="pengarang_exist_wrapper_{{ $jenis_buku->id}}">
                                <div class="row">
                                    <div class="col-12 col-lg-5 mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon11">
                                                <iconify-icon icon="bx:hash"></iconify-icon>
                                            </span>
                                            <input value="{{ $pengarang->no_identitas }}" id="no_pengarang_{{ $jenis_buku->id}}" name="no_pengarang_{{ $jenis_buku->id}}[]" type="text" class="form-control " placeholder="Enter An ID Author " aria-describedby="basic-addon13" readonly />
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon11">
                                                <iconify-icon icon="bxs:user"></iconify-icon>
                                            </span>
                                            <input value="{{  $pengarang->nama_depan }}" id="nama_pengarang_depan_{{ $jenis_buku->id}}" name="nama_pengarang_depan_{{ $jenis_buku->id}}[]" type="text" class="form-control " placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" readonly />
                                        </div>
                                    </div>
                                    <div class="col-10 col-lg-3 mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon11">
                                                <iconify-icon icon="bxs:user"></iconify-icon>
                                            </span>
                                            <input value="{{ $pengarang->nama_belakang }}" id="nama_pengarang_belakang_{{ $jenis_buku->id}}" name="nama_pengarang_belakang_{{ $jenis_buku->id}}[]" type="text" class="form-control" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" readonly />
                                        </div>
                                    </div>
                                    <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_">
                                        <a class="btn btn-icon btn-danger remove_pengarang_exist_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">
                                            <span><iconify-icon icon="bxs:trash" class="tf-icons bx"></iconify-icon></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="pengarang_wrapper_{{ $jenis_buku->id}}">
                        </div>
                    </div>
                    @foreach ($jenis_buku->file_place as $field)
                        @if($field->nama == 'Pembimbing' && $field->tipe == 'text')
                            <div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <label for="defaultFormControlInput" class="form-label"> No Identitas / NIP </label>
                                    </div>
                                    <div class="col-10 col-lg-5">
                                        <label for="defaultFormControlInput" class="form-label"> Nama Pembimbing </label>
                                    </div>
                                </div>
                                @foreach ($donasi->pembimbing_place as $pembimbing)
                                    <div class="pembimbing_exist_wrapper_{{ $jenis_buku->id}}" id="pembimbing_exist_wrapper_{{ $jenis_buku->id}}">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon11">
                                                        <iconify-icon icon="bx:hash"></iconify-icon>
                                                    </span>
                                                    <input value="{{ $pembimbing->no_identitas }}" id="no_pembimbing_{{ $jenis_buku->id}}" name="no_pembimbing_{{ $jenis_buku->id}}[]" type="text" class="form-control" placeholder="Enter An ID Mentor " aria-describedby="basic-addon13" readonly />
                                                </div>
                                            </div>
                                            <div class="col-10 col-lg-5 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon11">
                                                        <iconify-icon icon="bxs:user"></iconify-icon>
                                                    </span>
                                                    <input value="{{ $pembimbing->nama }}" name="pembimbing_{{ $jenis_buku->id}}[]" id="pembimbing_{{ $jenis_buku->id}}" type="text" class="form-control " placeholder="Enter A Mentor " aria-describedby="basic-addon13" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_">
                                                <a class="btn btn-icon btn-danger remove_pembimbing_exist_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">
                                                    <span><iconify-icon icon="bxs:trash" class="tf-icons bx"></iconify-icon></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pembimbing_wrapper_{{ $jenis_buku->id}}">
                            </div>
                        @endif
                    @endforeach
                    <div class="row">
                        @foreach ($jenis_buku->file_place as $field)
                            @if($field->nama == 'Penyunting' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Nama Penyunting
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:user"></iconify-icon>
                                        </span>
                                        <input
                                            id="penyunting_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('penyunting_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="penyunting_{{ $jenis_buku->id}}"
                                            placeholder="Enter An Editor"
                                            aria-describedby="basic-addon13"
                                            value="{{ $donasi->penyunting }}"
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="penyunting_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                            @if($field->nama == 'Penerjemah' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Nama Penerjemah
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:user"></iconify-icon>
                                        </span>
                                        <input
                                            id="penerjemah_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('penerjemah_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="penerjemah_{{ $jenis_buku->id}}"
                                            placeholder="Enter A Translator"
                                            aria-describedby="basic-addon13"
                                            value="{{ $donasi->penerjemah }}"
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="penerjemah_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                            @if($field->nama == 'Penerbit' && $field->tipe == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Nama Penerbit
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:user"></iconify-icon>
                                        </span>
                                        <input
                                            id="penerbit_{{ $jenis_buku->id}}"
                                            type="text"
                                            class="form-control @error('penerbit_{{ $jenis_buku->id}}') is-invalid @enderror"
                                            name="penerbit_{{ $jenis_buku->id}}"
                                            placeholder="Enter A Publisher"
                                            aria-describedby="basic-addon13"
                                            value="{{ $donasi->penerbit }}"
                                            required
                                            autofocus
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="penerbit_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-sm-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Cover Buku (PNG/JPG)
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:file-image"></iconify-icon>
                                </span>
                                <input class="form-control" type="file" id="filecover_{{ $jenis_buku->id}}" name="filecover_{{ $jenis_buku->id}}"/>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="filecover_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        @foreach ($jenis_buku->file_place as $field)
                            @if($field->nama == 'File' && $field->tipe == 'fullfile')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Full File (PDF) / E-Book
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:file-pdf"></iconify-icon>
                                        </span>
                                        <input class="form-control" type="file" id="fullfile_edit_{{ $field->id }}_{{ $jenis_buku->id }}" name="fullfile_edit_{{ $field->id }}_{{ $jenis_buku->id }}" />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="fullfile_edit_{{ $field->id }}_{{ $jenis_buku->id }}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-sm-6 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Sirkulasi
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                </span>
                                <select class="form-select sirkulasi @error('sirkulasi_{{ $jenis_buku->id}}') is-invalid @enderror" id="sirkulasi_{{ $jenis_buku->id}}" name="sirkulasi_{{ $jenis_buku->id}}">
                                    <option value=""></option>
                                    @foreach ($sirkulasi as $sirkulasibuku)
                                        <option value="{{ $sirkulasibuku->id }}">{{ $sirkulasibuku->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="sirkulasi_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Status
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:check-circle"></iconify-icon>
                                </span>
                                <select class="form-select status @error('status_{{ $jenis_buku->id}}') is-invalid @enderror" id="status_{{ $jenis_buku->id}}" name="status_{{ $jenis_buku->id}}">
                                    <option value=""></option>
                                    <option value=0>Non Active</option>
                                    <option value=1>Active</option>
                                </select>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="status_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Role Download
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <iconify-icon icon="bxs:download"></iconify-icon>
                                </span>
                                <select class="form-select role_download @error('role_download_{{ $jenis_buku->id}}') is-invalid @enderror" id="role_download_{{ $jenis_buku->id}}" name="role_download_{{ $jenis_buku->id}}">
                                    <option value=""></option>
                                    <option value=0>Tidak Bisa Didownload</option>
                                    <option value=1>Bisa Didownload</option>
                                </select>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="role_download_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Abstrak/Ringkasan Buku
                            </label>
                            <div class="input-group input-group-merge">
                                <textarea
                                    id="abstrak"
                                    type="text"
                                    class="form-control @error('abstrak_{{ $jenis_buku->id}}') is-invalid @enderror"
                                    name="abstrak_{{ $jenis_buku->id}}"
                                    placeholder="Enter Your Abstrak"
                                    aria-label="Enter Your Abstrak"
                                    aria-describedby="basic-icon-default-message2"
                                    autofocus
                                >{!! $donasi->ringkasan !!}</textarea>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="abstrak_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($jenis_buku->file_place as $field)
                            @if($field->tipe == 'pdf')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        {{ $field->nama }}
                                    </label>
                                    @if($field->catatan != null)
                                        <div id="defaultFormControlHelp" class="form-text mb-2" style="margin-top:  -3px;">
                                            <span>{{ $field->catatan }}</span>
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <iconify-icon icon="bxs:file-pdf"></iconify-icon>
                                        </span>
                                        <input class="form-control" type="file" id="filepdf_{{ $field->id }}_{{ $jenis_buku->id }}" name="filepdf_{{ $field->id }}_{{ $jenis_buku->id }}" />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="filepdf_{{ $field->id }}_{{ $jenis_buku->id }}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
              @endforeach
              <div class="row justify-content-left mt-2">
                <div class="col-sm-12 d-grid gap-2 mx-auto">
                    <button class="btn btn-primary" type="submit">Submit</button>
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
    <!-- Dinamically -->

    <!-- AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- JS untuk Validation -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
    <script src="{{ asset('assets/js/validate-buku.js') }}"></script>

    <script>
        tinymce.init({
            selector: "#abstrak",
            height: 500,
            menubar: false,
            width: "100%",
            plugins: "link lists searchreplace fullscreen hr print preview " +
                "anchor code save emoticons directionality spellchecker",
            toolbar: "cut copy | undo redo | styleselect searchplace formatselect " +
                "fullscreen | bold italic underline strikethrough " +
                "| removeformat | alignleft aligncenter " +
                "alignright alignjustify | bullist numlist outdent indent " +
                "| preview code cancel"
        });
    </script>

    <script src="{{ asset('assets/js/katalog-edit.js') }}"></script>
@endsection
