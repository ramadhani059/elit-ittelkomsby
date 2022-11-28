@extends('layout.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">Katalog Buku/ List Buku/</span> Tambah Buku</h5>
        </div>
    </div>

    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('akuisisi-buku.store') }}" method="POST" enctype="multipart/form-data" id="katalogForm">
              @csrf
              <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Kode Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bx-hash"></i>
                        </span>
                        <input
                            id="kode_buku"
                            type="text"
                            class="form-control @error('kode_buku') is-invalid @enderror"
                            name="kode_buku"
                            value="{{ old('kode_buku') }}"
                            placeholder="01.04.2238"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="kode_buku-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        No Inventaris
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bx-hash"></i>
                        </span>
                        <input
                            id="no_inventaris"
                            type="text"
                            class="form-control @error('no_inventaris') is-invalid @enderror"
                            name="no_inventaris"
                            value="{{ old('no_inventaris') }}"
                            placeholder="TA000001"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="no_inventaris-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        ISBN
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bx-hash"></i>
                        </span>
                        <input
                            id="isbn"
                            type="text"
                            class="form-control @error('isbn') is-invalid @enderror"
                            name="isbn"
                            value="{{ old('isbn') }}"
                            placeholder="Enter ISBN"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="isbn-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Lokasi Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-bar-chart-alt-2"></i>
                        </span>
                        <input
                            id="lokasi_buku"
                            type="text"
                            class="form-control @error('lokasi_buku') is-invalid @enderror"
                            name="lokasi_buku"
                            value="{{ old('lokasi_buku') }}"
                            placeholder="R. X.XX"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="lokasi_buku-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Judul Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-book-alt"></i>
                        </span>
                        <input
                            id="judul_buku"
                            type="text"
                            class="form-control @error('judul_buku') is-invalid @enderror"
                            name="judul_buku"
                            value="{{ old('judul_buku') }}"
                            placeholder="Enter Your Book Title "
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="judul_buku-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Anak Judul
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-book-alt"></i>
                        </span>
                        <input
                            id="anak_judul"
                            type="text"
                            class="form-control @error('anak_judul') is-invalid @enderror"
                            name="anak_judul"
                            value="{{ old('anak_judul') }}"
                            placeholder="Enter Your Book Title "
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="anak_judul-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Edisi
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-book-alt"></i>
                        </span>
                        <input
                            id="edisi_buku"
                            type="text"
                            class="form-control @error('edisi_buku') is-invalid @enderror"
                            name="edisi_buku"
                            value="{{ old('edisi_buku') }}"
                            placeholder="Enter Your Book Edition "
                            aria-describedby="basic-addon13"
                        />
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Jenis Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-book-alt"></i>
                        </span>
                        <select class="form-select jenis_buku @error('jenis_buku') is-invalid @enderror" id="jenis_buku" name="jenis_buku">
                            <option value=""></option>
                            @foreach ($jenisbuku as $jenisbuku)
                                <option value="{{ $jenisbuku->id}}">{{ $jenisbuku->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="jenis_buku-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Ilustrasi
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-book-alt"></i>
                        </span>
                        <input
                            id="ilustrasi"
                            type="text"
                            class="form-control @error('ilustrasi') is-invalid @enderror"
                            name="ilustrasi"
                            value="{{ old('ilustrasi') }}"
                            placeholder="Enter Your Book Illustration "
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="ilustrasi-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Dimensi Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-book-alt"></i>
                        </span>
                        <input
                            id="dimensi"
                            type="text"
                            class="form-control @error('dimensi') is-invalid @enderror"
                            name="dimensi"
                            value="{{ old('dimensi') }}"
                            placeholder="Enter Your Book Dimension "
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="dimensi-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Jumlah Eksemplar
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-book-alt"></i>
                        </span>
                        <input
                            id="jumlah_eksemplar"
                            type="text"
                            class="form-control @error('jumlah_eksemplar') is-invalid @enderror"
                            name="jumlah_eksemplar"
                            value="{{ old('jumlah_eksemplar') }}"
                            placeholder="0 Book"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="jumlah_eksemplar-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Kota Terbit
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-buildings"></i>
                        </span>
                        <input
                            id="kota_terbit"
                            type="text"
                            class="form-control @error('kota_terbit') is-invalid @enderror"
                            name="kota_terbit"
                            value="{{ old('kota_terbit') }}"
                            placeholder="Surabaya"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="kota_terbit-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Tahun Terbit
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-calendar"></i>
                        </span>
                        <input
                            id="tahun_terbit"
                            type="text"
                            class="form-control @error('tahun_terbit') is-invalid @enderror"
                            name="tahun_terbit"
                            value="{{ old('tahun_terbit') }}"
                            placeholder="20XX"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="tahun_terbit-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Subjek
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-group"></i>
                        </span>
                        <select class="form-select subjek @error('subjek') is-invalid @enderror" id="subjek" name="subjek">
                            <option value=""></option>
                            <option value="add">Add a Subject</option>
                            @foreach ($subjek as $subjek)
                                <option value="{{ $subjek->id}}">{{ $subjek->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="subjek-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 addsubjek" id="addsubjek" style="display: none;">
                    <label for="defaultFormControlInput" class="form-label">
                        Tambah Subjek
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-user-plus"></i>
                        </span>
                        <input
                            id="tambah_subjek"
                            type="text"
                            class="form-control @error('tambah_subjek') is-invalid @enderror"
                            name="tambah_subjek"
                            value="{{ old('tambah_subjek') }}"
                            placeholder="Enter a Subject"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="tambah_subjek-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Pengarang
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-user"></i>
                        </span>
                        <select class="form-select pengarang @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang">
                            <option value=""></option>
                            <option value="add">Add an Author</option>
                            @foreach ($pengarang as $pengarang)
                                <option value="{{ $pengarang->id}}">{{ $pengarang->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="pengarang-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 addpengarang" id="addpengarang" style="display: none;">
                    <label for="defaultFormControlInput" class="form-label">
                        Tambah Pengarang
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-user-plus"></i>
                        </span>
                        <input
                            id="tambah_pengarang"
                            type="text"
                            class="form-control @error('tambah_pengarang') is-invalid @enderror"
                            name="tambah_pengarang"
                            value="{{ old('tambah_pengarang') }}"
                            placeholder="Enter an Author"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="tambah_pengarang-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Penyunting
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-user"></i>
                        </span>
                        <select class="form-select penyunting @error('penyunting') is-invalid @enderror" id="penyunting" name="penyunting">
                            <option value=""></option>
                            <option value="add">Add an Editor</option>
                            @foreach ($penyunting as $penyunting)
                                <option value="{{ $penyunting->id}}">{{ $penyunting->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="penyunting-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 addpenyunting" id="addpenyunting" style="display: none;">
                    <label for="defaultFormControlInput" class="form-label">
                        Tambah Penyunting
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-user-plus"></i>
                        </span>
                        <input
                            id="tambah_penyunting"
                            type="text"
                            class="form-control @error('tambah_penyunting') is-invalid @enderror"
                            name="tambah_penyunting"
                            value="{{ old('tambah_penyunting') }}"
                            placeholder="Enter an Editor"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="tambah_penyunting-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Penerbit
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-building"></i>
                        </span>
                        <select class="form-select penerbit @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit">
                            <option value=""></option>
                            <option value="add">Add a Publisher</option>
                            @foreach ($penerbit as $penerbit)
                                <option value="{{ $penerbit->id}}">{{ $penerbit->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="penerbit-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 addpenerbit" id="addpenerbit" style="display: none;">
                    <label for="defaultFormControlInput" class="form-label">
                        Tambah Penerbit
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-building"></i>
                        </span>
                        <input
                            id="_penerbit"
                            type="text"
                            class="form-control @error('tambah_penerbit') is-invalid @enderror"
                            name="tambah_penerbit"
                            value="{{ old('tambah_penerbit') }}"
                            placeholder="Enter an Publisher"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="tambah_penerbit-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Cover Buku (PNG/JPG)
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-file-image"></i>
                        </span>
                        <input class="form-control" type="file" id="filecover" name="filecover" />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="filecover-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        File (PDF)
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-file-pdf"></i>
                        </span>
                        <input class="form-control" type="file" id="filepdf" name="filepdf" />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="filepdf-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Sirkulasi
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-book-alt"></i>
                        </span>
                        <select class="form-select sirkulasi @error('sirkulasi') is-invalid @enderror" id="sirkulasi" name="sirkulasi">
                            <option value=""></option>
                            @foreach ($sirkulasi as $sirkulasi)
                                <option value="{{ $sirkulasi->id}}">{{ $sirkulasi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="sirkulasi-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Status
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-check-circle"></i>
                        </span>
                        <select class="form-select status @error('status') is-invalid @enderror" id="status" name="status">
                            <option value=""></option>
                            <option value=0>Non Active</option>
                            <option value=1>Active</option>
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="status-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-3 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Role Download
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-download"></i>
                        </span>
                        <select class="form-select role_download @error('role_download') is-invalid @enderror" id="role_download" name="role_download">
                            <option value=""></option>
                            <option value=0>Tidak Bisa Didownload</option>
                            <option value=1>Bisa Didownload</option>
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="role_download-errorMsg"></span>
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
                          class="form-control @error('abstrak') is-invalid @enderror"
                          name="abstrak"
                          value="{{ old('abstrak') }}"
                          placeholder="Enter Your Abstrak"
                          aria-label="Enter Your Abstrak"
                          aria-describedby="basic-icon-default-message2"
                          required
                          autofocus
                        ></textarea>
                      </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="abstrak-errorMsg"></span>
                    </div>
                </div>
              </div>
              <div>
                <div class="row rolefile" id="rolefile" style="display: none;">
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Cover Buku (PDF)
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filecoverpdf" name="filecoverpdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filecoverpdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Disclimer (Pernyataan Orisinalitas)
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filedisclimerpdf" name="filedisclimerpdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filedisclimerpdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Lembar Pengesahan yang Sudah Bertandatangan
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filepengesahanpdf" name="filepengesahanpdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filepengesahanpdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Abstrak
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="fileabstrakpdf" name="fileabstrakpdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="fileabstrakpdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Lembar Persembahan
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filepersembahanpdf" name="filepersembahanpdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filepersembahanpdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Kata Pengantar
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filepengantarpdf" name="filepengantarpdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filepengantarpdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Daftar Isi
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filedaftarisipdf" name="filedaftarisipdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filedaftarisipdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Daftar Gambar
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filedaftargambarpdf" name="filedaftargambarpdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filedaftargambarpdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Daftar Tabel
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filedaftartabelpdf" name="filedaftartabelpdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filedaftartabelpdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Bab 1
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filebab1pdf" name="filebab1pdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filebab1pdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Bab 2
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filebab2pdf" name="filebab2pdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filebab2pdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Bab 3
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filebab3pdf" name="filebab3pdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filebab3pdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Bab 4
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filebab4pdf" name="filebab4pdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filebab4pdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Bab 5
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filebab5pdf" name="filebab5pdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filebab5pdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Bab 6
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filebab6pdf" name="filebab6pdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filebab6pdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Bab 7
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filebab7pdf" name="filebab7pdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filebab7pdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Daftar Pustaka
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filedaftarpustakapdf" name="filedaftarpustakapdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filedaftarpustakapdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Lampiran
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filelampiranpdf" name="filelampiranpdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filelampiranpdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Materi Presentasi
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="filemateripresenstasipdf" name="filemateripresenstasipdf" />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="filemateripresenstasipdf-errorMsg"></span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="defaultFormControlInput" class="form-label">
                            Proposal yang sudah direvisi
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon11">
                                <i class="bx bxs-file-pdf"></i>
                            </span>
                            <input class="form-control" type="file" id="fileproposalpdf" name="fileproposalpdf"  />
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger">
                            <span class="errorTxt" id="fileproposalpdf-errorMsg"></span>
                        </div>
                    </div>
                </div>
              </div>
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
            $("#jenis_buku").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $("#subjek").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $("#pengarang").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $("#penyunting").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $("#penerbit").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $("#sirkulasi").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $("#status").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $("#role_download").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $('#jenis_buku').on('change',function(){
                const some = $(this).find('option:selected').val();
                console.log(some);
                $(".rolefile").hide();

                $.ajax({
                    url: '/getJenisBuku/'+some,
                    type: "GET",
                    dataType: "json",
                    success: function(jenisbuku){
                        $.each(jenisbuku, function(index, nama){
                            if(nama.role_file){
                                $("#rolefile").show();
                            }
                        })
                    }
                });
            });

            $('.subjek').on('change',function(){
                $(".addsubjek").hide();
                var target = $(this).find('option:selected').val();
                /* console.log(target); */
                if (target == 'add'){
                    $("#addsubjek").show();
                };
            });

            $('.pengarang').on('change',function(){
                $(".addpengarang").hide();
                var author = $(this).find('option:selected').val();
                /* console.log(target); */
                if (author == 'add'){
                    $("#addpengarang").show();
                };
            });

            $('.penyunting').on('change',function(){
                $(".addpenyunting").hide();
                var editor = $(this).find('option:selected').val();
                /* console.log(target); */
                if (editor == 'add'){
                    $("#addpenyunting").show();
                };
            });

            $('.penerbit').on('change',function(){
                $(".addpenerbit").hide();
                var publisher = $(this).find('option:selected').val();
                /* console.log(target); */
                if (publisher == 'add'){
                    $("#addpenerbit").show();
                };
            });
        });
    </script>
@endsection
