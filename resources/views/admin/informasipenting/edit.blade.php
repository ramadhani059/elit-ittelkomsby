@extends('layout.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi Penting /</span> Add</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <!-- Account -->
        <form action="{{ route('information-admin.update', ['information_admin' => $info->id]) }}" method="POST" enctype="multipart/form-data" id="AksesJurnalForm">
        @csrf
        @method('PUT')
            <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img
                    src="{{ asset('storage/information/'.$info->img_encrypt) }}"
                    alt="Informasi Penting"
                    class="d-block rounded"
                    height="127"
                    width="221"
                    id="uploadedAvatar"
                />
                <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Edit Image</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                        type="file"
                        id="upload"
                        class="account-file-input"
                        name="img_info"
                        hidden
                        accept="image/png, image/jpeg"
                    />
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                </button>
                <p class="text-muted mb-0">Format yang Diterima Yaitu JPG, GIF, atau PNG dengan Rekomendasi Ukuran 875x500 dan Max Besar File 800K</p>
                <div id="defaultFormControlHelp" class="form-text text-danger">
                    @error('img_info')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                </div>
                </div>
            </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Judul Informasi
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:info-circle"></iconify-icon>
                        </span>
                        <input
                            id="judul"
                            type="text"
                            class="form-control @error('judul') is-invalid @enderror"
                            name="judul"
                            value="{{ $info->judul }}"
                            placeholder="Information Title"
                            aria-describedby="basic-addon13"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        @error('judul')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Status
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:info-circle"></iconify-icon>
                        </span>
                        <select class="form-select status @error('status') is-invalid @enderror" id="status" name="status">
                            <option value=""></option>
                            @foreach($status as $statusinfo)
                                <option value="{{ $statusinfo }}" {{ $info->status == $statusinfo ? 'selected' : '' }}>{{ $statusinfo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        @error('status')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Content
                    </label>
                    <div class="input-group input-group-merge">
                        <textarea
                            id="content"
                            type="text"
                            class="form-control @error('content') is-invalid @enderror"
                            name="content"
                            placeholder="Enter Information Content"
                            aria-label="Enter Information Content"
                            aria-describedby="basic-icon-default-message2"
                            autofocus
                        >{!! $info->isi !!}</textarea>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        @error('content')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                </div>
                <div class="mt-4">
                    <div class="row">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <button class="btn btn-primary btn-lg text-white" type="submit">Simpan</button>
                        </div>
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <a class="btn btn-danger btn-lg text-white" type="button" href="{{ route('information-admin.index') }}">Cancel</a>
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
        tinymce.init({
            selector: "#content",
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

    <script>
        $(document).ready(function () {
            $("#status").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });
        });
    </script>
@endsection
