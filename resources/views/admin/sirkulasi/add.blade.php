@extends('layout.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">Katalog Buku/ Sirkulasi Buku/</span> Tambah Sirkulasi Buku</h5>
        </div>
    </div>

    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('sirkulasi.store') }}" method="POST" enctype="multipart/form-data" id="katalogForm">
              @csrf
              <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Sirkulasi
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bx-hash"></i>
                        </span>
                        <input
                            id="namasirkulasi"
                            type="text"
                            class="form-control @error('namasirkulasi') is-invalid @enderror"
                            name="namasirkulasi"
                            value="{{ old('namasirkulasi') }}"
                            placeholder="Enter Circulation Name"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="namasirkulasi-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Biaya Sewa
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bx-dollar"></i>
                        </span>
                        <input
                            id="biayasewa"
                            type="text"
                            class="form-control @error('biayasewa') is-invalid @enderror"
                            name="biayasewa"
                            value="{{ old('biayasewa') }}"
                            placeholder="Enter Rental Fee"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="biayasewa-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Denda Harian
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <i class="bx bx-dollar"></i>
                        </span>
                        <input
                            id="dendaharian"
                            type="text"
                            class="form-control @error('dendaharian') is-invalid @enderror"
                            name="dendaharian"
                            value="{{ old('dendaharian') }}"
                            placeholder="Enter Daily Fine"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="dendaharian-errorMsg"></span>
                    </div>
                </div>
              </div>
              <div class="row justify-content-left mt-3">
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <a class="btn btn-danger" data-toggle="tooltip" href="{{ route('sirkulasi.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
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
            $("#role_file").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });
        });
    </script>
@endsection
