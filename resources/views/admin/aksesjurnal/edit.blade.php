@extends('layout.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Akses Jurnal /</span> Add</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <!-- Account -->
        <form action="{{ route('akses-jurnal.update', ['akses_jurnal' => $akses->id]) }}" method="POST" enctype="multipart/form-data" id="AksesJurnalForm">
        @csrf
        @method('PUT')
            <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img
                    src="{{ asset('storage/aksesjurnal/'.$akses->img_encrypt) }}"
                    alt="Akses Jurnal"
                    class="d-block rounded"
                    height="127"
                    width="221"
                    id="uploadedAvatar"
                />
                <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload Image</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                        type="file"
                        id="upload"
                        class="account-file-input"
                        name="photo"
                        hidden
                        accept="image/png, image/jpeg"
                    />
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                </button>
                <p class="text-muted mb-0">Format yang Diterima Yaitu JPG, GIF, atau PNG dengan Ukuran 884x506 dan Max Besar File 800K</p>
                </div>
            </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Akses Jurnal
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:book-bookmark"></iconify-icon>
                        </span>
                        <input
                            id="judulaksesjurnal"
                            type="text"
                            class="form-control @error('judulaksesjurnal') is-invalid @enderror"
                            name="judulaksesjurnal"
                            value="{{ $akses->judul }}"
                            placeholder="Journal Access Title"
                            aria-describedby="basic-addon13"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="judulaksesjurnal-errorMsg"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Link Website
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bx:link-alt"></iconify-icon>
                        </span>
                        <input
                            id="link"
                            type="tel"
                            class="form-control @error('link') is-invalid @enderror"
                            name="link"
                            value="{{ $akses->link }}"
                            placeholder="https://"
                            aria-describedby="basic-addon13"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="link-errorMsg"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Kategori
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:book"></iconify-icon>
                        </span>
                        <select class="form-select kategoriaksesjurnal @error('kategoriaksesjurnal') is-invalid @enderror" id="kategoriaksesjurnal" name="kategoriaksesjurnal">
                            <option value=""></option>
                            @foreach($kategori as $category)
                                <option value="{{ $category }}" {{ $akses->kategori == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="kategoriaksesjurnal-errorMsg"></span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="row">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <button class="btn btn-primary btn-lg text-white" type="submit">Simpan</button>
                        </div>
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <a class="btn btn-danger btn-lg text-white" type="button" href="{{ route('akses-jurnal.index') }}">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /Account -->
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.2/dist/iconify-icon.min.js"></script>

    <!-- AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- JS untuk Validation -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
    <script src="{{ asset('assets/js/validateaksesjurnal.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#kategoriaksesjurnal").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });
        });
    </script>
@endsection
