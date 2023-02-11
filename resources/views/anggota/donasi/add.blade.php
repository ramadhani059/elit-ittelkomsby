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
                <h4 class="fw-bolder my-2">Donasi Buku</h4>
            </div>
        </div>
    </div>

    <div class="col-xxl container-fluid my-4">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ route('donasibuku.store') }}" method="POST" enctype="multipart/form-data" id="katalogForm">
              @csrf
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
                                <option value="{{ $jenis_buku->id}}">{{ $jenis_buku->nama }}</option>
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
                                    <iconify-icon icon="bxs:book-alt"></iconify-icon>
                                </span>
                                <input
                                    id="judul_buku_{{ $jenis_buku->id}}"
                                    type="text"
                                    class="form-control @error('judul_buku_{{ $jenis_buku->id}}') is-invalid @enderror"
                                    name="judul_buku_{{ $jenis_buku->id}}"
                                    placeholder="Enter Your Book Title "
                                    aria-describedby="basic-addon13"
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
                                        />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="edisi_buku_{{ $jenis_buku->id}}-errorMsg"></span>
                                    </div>
                                </div>
                            @endif
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
                                                <option value="{{ $fakultas_itts->id }}">{{ $fakultas_itts->nama }}</option>
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
                                                <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
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
                                    required
                                    autofocus
                                />
                            </div>
                            <div id="defaultFormControlHelp" class="form-text text-danger">
                                <span class="errorTxt" id="tahun_terbit_{{ $jenis_buku->id}}-errorMsg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="subjek_wrapper_{{ $jenis_buku->id}}">
                    </div>
                    <div class="pengarang_wrapper_{{ $jenis_buku->id}}">
                    </div>
                    @foreach ($jenis_buku->file_place as $field)
                        @if($field->nama == 'Pembimbing' && $field->tipe == 'text')
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
                                <input class="form-control" type="file" id="filecover_{{ $jenis_buku->id}}" name="filecover_{{ $jenis_buku->id}}" />
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
                                        <input class="form-control" type="file" id="fullfile_{{ $field->id }}_{{ $jenis_buku->id }}" name="fullfile_{{ $field->id }}_{{ $jenis_buku->id }}" />
                                    </div>
                                    <div id="defaultFormControlHelp" class="form-text text-danger">
                                        <span class="errorTxt" id="fullfile_{{ $field->id }}_{{ $jenis_buku->id }}-errorMsg"></span>
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
                                ></textarea>
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
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-sm-6 d-grid gap-2 mx-auto">
                    <a class="btn btn-danger" href="{{ route('donasibuku.index')}}">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Dinamically -->

    <!-- Text Area -->

    <!-- AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- JS untuk Validation -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
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

    <script>
        var x = 0;

        $(document).ready(function () {

            $("#jenis_buku").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            $('#jenis_buku').on('change',function(){
                $(".some").hide();
                var some = $(this).find('option:selected').val();
                $("#some_" + some).show();
                x = 0;

                $(".field_subjek_"+some).remove();
                $(".field_pengarang_"+some).remove();
                $(".field_pembimbing_"+some).remove();

                $('.subjek_wrapper_'+some).append(`
                <div class="field_subjek_${some}">\
                    <div class="row">\
                        <div class="col-10 col-lg-11">\
                            <label for="defaultFormControlInput" class="form-label"> Nama Subjek </label>\
                        </div>\
                    </div>\
                    <div class="row">\
                        <div class="col-10 col-lg-11 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="subjek_${some}" type="text" class="form-control @error('subjek_${some}') is-invalid @enderror" name="subjek_${some}[]" placeholder="Enter A Subject " aria-describedby="basic-addon13" required autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="subjek_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-1 mb-3 text-end" id="btn_plus">\
                            <a class="btn btn-icon btn-dark add_button_subjek_${some}" id="tombol_plus" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);" >\
                                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>`);

                $('.pengarang_wrapper_'+some).append(`
                <div class="field_pengarang_${some}">\
                    <div class="row">\
                        <div class="col-12 col-lg-5 mb-3">\
                            <div>\
                                <label for="defaultFormControlInput" class="form-label"> No Identitas / NIM </label>\
                            </div>\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bx:hash"></iconify-icon>\
                                </span>\
                                <input id="no_pengarang_${some}" type="text" class="form-control @error('no_pengarang_${some}') is-invalid @enderror" name="no_pengarang_${some}[]" placeholder="Enter An ID Author " aria-describedby="basic-addon13" autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="no_pengarang_${some}[]-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-12 col-lg-3 mb-3">\
                            <div>\
                                <label for="defaultFormControlInput" class="form-label"> Nama Depan Pengarang </label>\
                            </div>\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="nama_pengarang_depan_${some}" type="text" class="form-control @error('nama_pengarang_depan_${some}') is-invalid @enderror" name="nama_pengarang_depan_${some}[]" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" required autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="nama_pengarang_depan_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-10 col-lg-3 mb-3">\
                            <div>\
                                <label for="defaultFormControlInput" class="form-label"> Nama Belakang Pengarang </label>\
                            </div>\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="nama_pengarang_belakang_${some}" type="text" class="form-control @error('nama_pengarang_belakang_${some}') is-invalid @enderror" name="nama_pengarang_belakang_${some}[]" placeholder="Enter The Author's Last Name " aria-describedby="basic-addon13" required autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="nama_pengarang_belakang_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-1 mb-4 text-end" id="btn_plus" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                            <a class="btn btn-icon btn-dark add_button_pengarang_${some}" id="tombol_plus" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);" >\
                                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>`);

                $('.pembimbing_wrapper_'+some).append(`
                <div class="field_pembimbing_${some}">\
                    <div class="row">\
                        <div class="col-12 col-lg-6">\
                            <label for="defaultFormControlInput" class="form-label"> No Identitas / NIP </label>\
                        </div>\
                        <div class="col-10 col-lg-5">\
                            <label for="defaultFormControlInput" class="form-label"> Nama Pembimbing </label>\
                        </div>\
                    </div>\
                    <div class="row">\
                        <div class="col-12 col-lg-6 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bx:hash"></iconify-icon>\
                                </span>\
                                <input id="no_pembimbing_${some}" type="text" class="form-control @error('no_pembimbing_${some}') is-invalid @enderror" name="no_pembimbing_${some}[]" placeholder="Enter An ID Mentor " aria-describedby="basic-addon13" autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="no_pembimbing_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-10 col-lg-5 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="pembimbing_${some}" type="text" class="form-control @error('pembimbing_${some}') is-invalid @enderror" name="pembimbing_${some}[]" placeholder="Enter A Mentor " aria-describedby="basic-addon13" required autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="pembimbing_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-1 mb-3 text-end" id="btn_plus">\
                            <a class="btn btn-icon btn-dark add_button_pembimbing_${some}" id="tombol_plus" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);" >\
                                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>`);

                $(".wrapper_pengarang_"+some).remove();

                $('#jenis_pengadaan_'+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $('#status_pengadaan_'+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#fakultas_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#prodi_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#sirkulasi_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#status_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#role_download_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $('#checkkodebuku_'+ some).click(function(e){
                    const kodebuku = $('#kode_buku_'+ some).val();
                    // alert(kodebuku);

                    $.ajax({
                        url: '/getKodeBuku/'+kodebuku,
                        type: "GET",
                        dataType: "json",
                        success: function(infobuku){
                            if(infobuku.length === 1){
                                e.preventDefault();

                                var form = $(this).closest("form");
                                var name = $(this).data("name");

                                Swal.fire({
                                    title: "Buku Sudah Terdaftar !!",
                                    text: "Apakah Kamu Ingin Menambah Eksemplar ??",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "bg-danger",
                                    confirmButtonText: "Ya, Saya yakin !",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "{{URL::to('/home')}}"
                                    }
                                });
                            } else {
                                $('.toast').addClass("show");
                            }
                        }
                    });
                });

                var maxFieldSubjek = 100;
                var maxFieldPengarang = 100;
                var maxFieldPembimbing = 100;

                $('.add_button_subjek_'+some).on('click', function(e){
                    if(x < maxFieldSubjek){
                        x++;
                        $('.subjek_wrapper_'+some).append(`
                        <div class="wrapper_subjek_${some}" id="wrapper_subjek_${some}">\
                            <div class="row">\
                                <div class="col-10 col-lg-11 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="subjek_${some}" type="text" class="form-control @error('subjek_${some}') is-invalid @enderror" name="subjek_${some}[]" placeholder="Enter A Subject " aria-describedby="basic-addon13" required autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="subjek_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_${x}">\
                                    <a class="btn btn-icon btn-danger remove_subjek_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                        <span><iconify-icon icon="bxs:trash" class="tf-icons bx"></iconify-icon></span>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>`);
                    }
                });

                $('.subjek_wrapper_'+some).on('click', '.remove_subjek_button', function(e){
                    e.preventDefault();
                    $(this).closest("#wrapper_subjek_"+some).remove(); //Remove field html
                });

                $('.add_button_pengarang_'+some).on('click', function(e){
                    if(x < maxFieldPengarang){
                        x++;
                        $('.pengarang_wrapper_'+some).append(`
                        <div class="wrapper_pengarang_${some}" id="wrapper_pengarang_${some}">\
                            <div class="row">\
                                <div class="col-12 col-lg-5 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bx:hash"></iconify-icon>\
                                        </span>\
                                        <input id="no_pengarang_${some}" type="text" class="form-control @error('no_pengarang_${some}') is-invalid @enderror" name="no_pengarang_${some}[]" placeholder="Enter An ID Author " aria-describedby="basic-addon13" autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="no_pengarang_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-12 col-lg-3 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="nama_pengarang_depan_${some}" type="text" class="form-control @error('nama_pengarang_depan_${some}') is-invalid @enderror" name="nama_pengarang_depan_${some}[]" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" required autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="nama_pengarang_depan_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-10 col-lg-3 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="nama_pengarang_belakang_${some}" type="text" class="form-control @error('nama_pengarang_belakang_${some}') is-invalid @enderror" name="nama_pengarang_belakang_${some}[]" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" required autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="nama_pengarang_belakang_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-2 col-lg-1 mb-4 text-end" id="btn_remove_${x}" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                                    <a class="btn btn-icon btn-danger remove_pengarang_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                        <span><iconify-icon icon="bxs:trash" class="tf-icons bx"></iconify-icon></span>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>`);
                    }
                });

                $('.pengarang_wrapper_'+some).on('click', '.remove_pengarang_button', function(e){
                    e.preventDefault();
                    $(this).closest("#wrapper_pengarang_"+some).remove(); //Remove field html
                });

                $('.add_button_pembimbing_'+some).on('click', function(e){
                    if(x < maxFieldPembimbing){
                        x++;
                        $('.pembimbing_wrapper_'+some).append(`
                        <div class="wrapper_pembimbing_${some}" id="wrapper_pembimbing_${some}">\
                            <div class="row">\
                                <div class="col-12 col-lg-6 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bx:hash"></iconify-icon>\
                                        </span>\
                                        <input id="no_pembimbing_${some}" type="text" class="form-control @error('no_pembimbing_${some}') is-invalid @enderror" name="no_pembimbing_${some}[]" placeholder="Enter An ID Mentor " aria-describedby="basic-addon13" autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="no_pembimbing_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-10 col-lg-5 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="pembimbing_${some}" type="text" class="form-control @error('pembimbing_${some}') is-invalid @enderror" name="pembimbing_${some}[]" placeholder="Enter A Mentor " aria-describedby="basic-addon13" required autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="pembimbing_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_${x}">\
                                    <a class="btn btn-icon btn-danger remove_pembimbing_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                        <span><iconify-icon icon="bxs:trash" class="tf-icons bx"></iconify-icon></span>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>`);
                    }
                });

                $('.pembimbing_wrapper_'+some).on('click', '.remove_pembimbing_button', function(e){
                    e.preventDefault();
                    $(this).closest("#wrapper_pembimbing_"+some).remove(); //Remove field html
                });

                $('.pengarang_'+some).on('change',function(){
                    $(".addpengarang_"+some).hide();
                    $("#style_pengarang").removeClass( "col-12" ).addClass("col-8");
                    $("#btn_plus").removeClass("text-end");
                    var author = $(this).find('option:selected').val();
                    /* console.log(target); */
                    if (author == 'add'){
                        $("#style_pengarang").removeClass( "col-8" ).addClass("col-12");
                        $("#btn_plus").addClass("text-end");
                        $("#addpengarang_"+some).show();
                    };
                });
            });
        });
    </script>
@endsection
