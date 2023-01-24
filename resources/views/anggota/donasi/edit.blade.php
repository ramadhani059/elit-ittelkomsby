@extends('layout.anggota')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-md-12 col-12">
                <h4 class="fw-bolder my-2">Edit Donasi Buku</h4>
            </div>
        </div>
    </div>

    @if($donasi->keterangan != null)
        <div class="col-xxl container-fluid my-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="p-2">
                                <span class="badge bg-danger"><span class="tf-icons bx bxs-comment-detail"></span>&nbsp; &nbsp; Komentar Untuk Donasi Buku Anda</span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="col-md-12 col-12">
                                            <div class="px-2 pt-1">
                                                <div class="overflow-auto" id="vertical-example">
                                                    {!! $donasi->keterangan !!}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Basic with Icons -->
    <div class="col-xxl container-fluid my-4">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('donasibuku.update', ['donasibuku' => $donasi->id]) }}" method="POST" enctype="multipart/form-data" id="katalogForm">
              @csrf
              @method('put')
              <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Jenis Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bxs-book-alt"></i>
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
                        @foreach ($jenis_buku->file_place as $field)
                            @if($field->name == 'ISBN' && $field->type == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        ISBN
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bx-hash"></i>
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
                        @endforeach
                        <div class="col-sm-12 mb-3">
                            <label for="defaultFormControlInput" class="form-label">
                                Judul Buku
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon11">
                                    <i class="bx bxs-book-alt"></i>
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
                            @if($field->name == 'Judul Buku Inggris' && $field->type == 'text')
                                <div class="col-sm-12 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Judul Buku (Bahasa Inggris)
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-book-alt"></i>
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
                            @if($field->name == 'Anak Judul' && $field->type == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Anak Judul
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-book-alt"></i>
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
                            @if($field->name == 'Edisi' && $field->type == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Edisi
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-book-alt"></i>
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
                        @foreach ($jenis_buku->file_place as $field)
                            @if($field->name == 'Ilustrasi' && $field->type == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Ilustrasi
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-book-alt"></i>
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
                            @if($field->name == 'Dimensi Buku' && $field->type == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Dimensi Buku
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-book-alt"></i>
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
                            @if($field->name == 'Program Studi' && $field->type == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Fakultas
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-graduation"></i>
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
                                            <i class="bx bxs-graduation"></i>
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
                                    <i class="bx bxs-book-alt"></i>
                                </span>
                                <input
                                    id="jumlah_eksemplar_{{ $jenis_buku->id}}"
                                    type="text"
                                    class="form-control @error('jumlah_eksemplar_{{ $jenis_buku->id}}') is-invalid @enderror"
                                    name="jumlah_eksemplar_{{ $jenis_buku->id}}"
                                    placeholder="0 Book"
                                    aria-describedby="basic-addon13"
                                    value="{{ $donasi->jml_eksemplar }}"
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
                                    <i class="bx bxs-buildings"></i>
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
                                    <i class="bx bxs-calendar"></i>
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
                                                <i class="bx bxs-user"></i>
                                            </span>
                                            <input value="{{ $subjek->nama }}" id="subjek_{{ $jenis_buku->id}}" name="subjek_{{ $jenis_buku->id}}[]" type="text" class="form-control " aria-describedby="basic-addon13" readonly />
                                        </div>
                                    </div>
                                    <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_">
                                        <a class="btn btn-icon btn-danger remove_subjek_exist_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">
                                            <span class="tf-icons bx bxs-trash"></span>
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
                                                <i class="bx bx-hash"></i>
                                            </span>
                                            <input value="{{ $pengarang->no_identitas }}" id="no_pengarang_{{ $jenis_buku->id}}" name="no_pengarang_{{ $jenis_buku->id}}[]" type="text" class="form-control " placeholder="Enter An ID Author " aria-describedby="basic-addon13" readonly />
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon11">
                                                <i class="bx bxs-user"></i>
                                            </span>
                                            <input value="{{  $pengarang->nama_depan }}" id="nama_pengarang_depan_{{ $jenis_buku->id}}" name="nama_pengarang_depan_{{ $jenis_buku->id}}[]" type="text" class="form-control " placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" readonly />
                                        </div>
                                    </div>
                                    <div class="col-10 col-lg-3 mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon11">
                                                <i class="bx bxs-user"></i>
                                            </span>
                                            <input value="{{ $pengarang->nama_belakang }}" id="nama_pengarang_belakang_{{ $jenis_buku->id}}" name="nama_pengarang_belakang_{{ $jenis_buku->id}}[]" type="text" class="form-control" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" readonly />
                                        </div>
                                    </div>
                                    <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_">
                                        <a class="btn btn-icon btn-danger remove_pengarang_exist_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">
                                            <span class="tf-icons bx bxs-trash"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="pengarang_wrapper_{{ $jenis_buku->id}}">
                        </div>
                    </div>
                    @foreach ($jenis_buku->file_place as $field)
                        @if($field->name == 'Pembimbing' && $field->type == 'text')
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
                                                        <i class="bx bx-hash"></i>
                                                    </span>
                                                    <input value="{{ $pembimbing->no_identitas }}" id="no_pembimbing_{{ $jenis_buku->id}}" name="no_pembimbing_{{ $jenis_buku->id}}[]" type="text" class="form-control" placeholder="Enter An ID Mentor " aria-describedby="basic-addon13" readonly />
                                                </div>
                                            </div>
                                            <div class="col-10 col-lg-5 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon11">
                                                        <i class="bx bxs-user"></i>
                                                    </span>
                                                    <input value="{{ $pembimbing->nama }}" name="pembimbing_{{ $jenis_buku->id}}[]" id="pembimbing_{{ $jenis_buku->id}}" type="text" class="form-control " placeholder="Enter A Mentor " aria-describedby="basic-addon13" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_">
                                                <a class="btn btn-icon btn-danger remove_pembimbing_exist_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">
                                                    <span class="tf-icons bx bxs-trash"></span>
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
                            @if($field->name == 'Penyunting' && $field->type == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Nama Penyunting
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-user"></i>
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
                            @if($field->name == 'Penerjemah' && $field->type == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Nama Penerjemah
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-user"></i>
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
                            @if($field->name == 'Penerbit' && $field->type == 'text')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Nama Penerbit
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-user"></i>
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
                                    <i class="bx bxs-file-image"></i>
                                </span>
                                <input class="form-control" type="file" id="filecover_{{ $jenis_buku->id}}" name="filecover_{{ $jenis_buku->id}}"/>
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="filecover_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                        @foreach ($jenis_buku->file_place as $field)
                            @if($field->name == 'File' && $field->type == 'fullfile')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        Full File (PDF) / E-Book
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-file-pdf"></i>
                                        </span>
                                        <input class="form-control" type="file" id="fullfile_edit_{{ $field->id }}_{{ $jenis_buku->id }}" name="fullfile_edit_{{ $field->id }}_{{ $jenis_buku->id }}" />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="fullfile_edit_{{ $field->id }}_{{ $jenis_buku->id }}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
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
                            @if($field->type == 'pdf')
                                <div class="col-sm-6 mb-3">
                                    <label for="defaultFormControlInput" class="form-label">
                                        {{ $field->name }}
                                    </label>
                                    @if($field->note != null)
                                        <div id="defaultFormControlHelp" class="form-text mb-2" style="margin-top:  -3px;">
                                            <span>{{ $field->note }}</span>
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon11">
                                            <i class="bx bxs-file-pdf"></i>
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
