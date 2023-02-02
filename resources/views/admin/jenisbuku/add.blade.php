@extends('layout.admin')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">Katalog Buku/ Jenis Buku/</span> Tambah Jenis Buku</h5>
        </div>
    </div>

    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('jenis-buku.store') }}" method="POST" enctype="multipart/form-data" id="katalogForm">
              @csrf
              <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Koleksi Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:book-bookmark"></iconify-icon>
                        </span>
                        <select class="form-select koleksibuku @error('koleksibuku') is-invalid @enderror" id="koleksibuku" name="koleksibuku">
                            <option value=""></option>
                            @foreach ($koleksibuku as $koleksibuku)
                                <option value="{{ $koleksibuku->id}}">{{ $koleksibuku->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="koleksibuku-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Kode Jenis Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bx:hash"></iconify-icon>
                        </span>
                        <input
                            id="kodejenisbuku"
                            type="text"
                            class="form-control @error('kodejenisbuku') is-invalid @enderror"
                            name="kodejenisbuku"
                            value="{{ old('kodejenisbuku') }}"
                            placeholder="Enter Book Code"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="kodejenisbuku-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Jenis Buku
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:book"></iconify-icon>
                        </span>
                        <input
                            id="namajenisbuku"
                            type="text"
                            class="form-control @error('namajenisbuku') is-invalid @enderror"
                            name="namajenisbuku"
                            value="{{ old('namajenisbuku') }}"
                            placeholder="Enter Book Name"
                            aria-describedby="basic-addon13"
                            required
                            autofocus
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="namajenisbuku-errorMsg"></span>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Identitas Buku
                    </label>
                    <div class="col-sm-12 form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="Kode Buku" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Kode Buku </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="ISBN" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> ISBN </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Lokasi Buku" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Lokasi Buku </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Judul Buku" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Judul Buku </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Judul Buku Inggris" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Judul Buku (Bahasa Inggris) </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Anak Judul" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Anak Judul </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Edisi" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Edisi </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Jenis Pengadaan" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Jenis Pengadaan </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="status_pengadaan" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Status Pengadaan </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Program Studi" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Program Studi </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Ilustrasi" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Ilustrasi </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Dimensi Buku" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Dimensi Buku </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Jumlah Eksemplar" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Jumlah Eksemplar </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Kota Terbit" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Kota Terbit </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Tahun Terbit" id="disabledCheck2"" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Tahun Terbit </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Pengarang" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Pengarang </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Subjek" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Subjek </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Penyunting" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Penyunting </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Penerjemah" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Penerjemah </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Pembimbing" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Pembimbing </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Penerbit" id="defaultCheck1" name="identitas_buku[]"/>
                        <label class="form-check-label" for="defaultCheck1"> Penerbit </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Cover Buku" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Cover Buku (Img) </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="File" id="defaultCheck1" name="fullfile"/>
                        <label class="form-check-label" for="defaultCheck1"> File PDF / E-Book </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Sirkulasi" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Sirkulasi </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Status Buku" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Status Buku </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Role Download" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Role Download </label>
                    </div>
                    <div class="col-sm-12 form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="Role Download" id="disabledCheck2" disabled checked/>
                        <label class="form-check-label" for="disabledCheck2"> Ringkasan Buku / Abstrak </label>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        File Persyaratan
                    </label>
                    <div class="file_wrapper">
                        <div class="row mt-2">
                            <div class="col-12 col-lg-5 mb-3">
                                <div class="input-group">
                                    <input
                                        style="border-top-right-radius: 0.3rem; border-bottom-right-radius: 0.3rem;"
                                        id="nama_file"
                                        type="text"
                                        class="form-control"
                                        name="nama_file[]"
                                        value="{{ old('nama_file') }}"
                                        placeholder="Enter a File Name"
                                        aria-describedby="basic-addon13"
                                    />
                                </div>
                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                    <span class="errorTxt" id="nama_file-errorMsg"></span>
                                </div>
                            </div>
                            <div class="col-10 col-lg-5 mb-3">
                                <div class="input-group">
                                    <input
                                        style="border-top-right-radius: 0.3rem; border-bottom-right-radius: 0.3rem;"
                                        id="note_file"
                                        type="text"
                                        class="form-control"
                                        name="note_file[]"
                                        value="{{ old('note_file') }}"
                                        placeholder="Enter a Note"
                                        aria-describedby="basic-addon13"
                                    />
                                </div>
                                <div id="defaultFormControlHelp" class="form-text text-danger">
                                    <span class="errorTxt" id="note_file-errorMsg"></span>
                                </div>
                            </div>
                            <div class="col-2 col-lg-2 mb-3 text-end" id="btn_plus">
                                <a
                                    class="btn btn-icon btn-dark add_button"
                                    data-toggle="tooltip"
                                    href="javascript:void(0);"
                                    role="button"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    style="
                                        width: calc(2.2rem + 2px);
                                        height: calc(2.2rem + 2px);"
                                >
                                    <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row justify-content-left mt-3">
                <div class="col-sm-6 d-grid gap-2 mx-auto mb-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-sm-6 d-grid gap-2 mx-auto mb-3">
                    <a class="btn btn-danger" data-toggle="tooltip" href="{{ route('jenis-buku.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
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
        var ListFile = [];
        var x = 0;

        $(document).ready(function () {
            $("#role_file").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });
            $("#koleksibuku").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            var maxField = 100;
            var addButton = $('.add_button');
            var wrapper = $('.file_wrapper');

            $(addButton).click(function(){
                if(x < maxField){
                    x++;
                    $(wrapper).append(`
                    <div class="row" id="wrapper_file">\
                        <div class="col-12 col-lg-5 mb-3">\
                            <div class="input-group">\
                                <input style="border-top-right-radius: 0.3rem; border-bottom-right-radius: 0.3rem;" id="nama_file" type="text" class="form-control" name="nama_file[]" value="{{ old('nama_file') }}" placeholder="Enter a File Name" aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="nama_file-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-10 col-lg-5 mb-3">\
                            <div class="input-group">\
                                <input style="border-top-right-radius: 0.3rem; border-bottom-right-radius: 0.3rem;" id="note_file" type="text" class="form-control" name="note_file[]" value="{{ old('note_file') }}" placeholder="Enter a Note" aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="note_file-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-2 mb-3 text-end" id="btn_remove_${x}">\
                            <a class="btn btn-icon btn-danger remove_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                <span><iconify-icon icon="bxs:trash" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>`);
                }
            });

            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).closest('#wrapper_file').remove(); //Remove field html
            });
        });
    </script>
@endsection
