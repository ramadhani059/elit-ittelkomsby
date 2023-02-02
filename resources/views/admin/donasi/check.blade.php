@extends('layout.admin')

@section('content')

<div class="modal fade" id="modalDecline" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <form action="{{ route('donasi-admin.checkditolak', ['donasi_admin_ditolak' => $donasi->id]) }}" method="POST" enctype="multipart/form-data" id="katalogForm">
      @csrf
      @method('put')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Pesan Penolakan Donasi Buku</h5>
          <a
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></a>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameLarge" class="form-label">Nama Donatur</label>
              <input value="{{ $donasi->anggota->nama_lengkap }}" type="text" id="nameLarge" class="form-control" placeholder="Enter Name" readonly/>
            </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
                <label for="defaultFormControlInput" class="form-label">
                    Pesan
                </label>
                <div class="input-group input-group-merge">
                    <textarea
                        id="pesan"
                        type="text"
                        class="form-control @error('pesan') is-invalid @enderror"
                        name="pesan"
                        placeholder="Enter Your Message"
                        aria-label="Enter Your Message"
                        aria-describedby="basic-icon-default-message2"
                        required
                    ><p>Maaf donasi anda ditolak karena...</p></textarea>
                </div>
                <div id="defaultFormControlHelp" class="form-text text-danger">
                    <span class="errorTxt" id="pesan-errorMsg"></span>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </a>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
    </div>
</div>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <div class="card">
                <div class="card-body mt-3 mx-2">
                    <h4 class="card-title fw-bolder text-capitalize">
                        {{ $donasi->judul }}
                    </h4>
                    <p class="card-text">
                        <div class="row media">
                            <div class="col-12">
                                <span><iconify-icon icon="bx:user" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                    @if ($donasi->pengarang_place->count('pivot.id_buku') != 1)
                                        @foreach ($donasi->pengarang_place->take(1) as $pengarangbuku)
                                            {{ $pengarangbuku->nama }}, dkk
                                        @endforeach
                                    @else
                                        @foreach ($donasi->pengarang_place->take(1) as $pengarangbuku)
                                            {{ $pengarangbuku->nama }}
                                        @endforeach
                                    @endif
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-3 mb-2">
            <div class="card">
              <div class="card-body">
                <img
                  class="img-fluid d-flex mx-auto"
                  src="@if ($donasi->cover != null)
                        {{ asset('storage/buku/cover/'.$donasi->cover) }}
                    @else
                        {{ asset('assets/img/home/1.png') }}
                    @endif"
                  alt="Card image cap"
                />
              </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-9 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-primary"><span><iconify-icon icon="bxs:book" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Informasi Umum</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Subjek</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            @if ($donasi->subjek_place->count('pivot.id_subjek') != 1)
                                                @foreach ($donasi->subjek_place as $subjekbuku)
                                                    {{ $subjekbuku->nama }},
                                                @endforeach
                                            @else
                                                @foreach ($donasi->subjek_place as $subjekbuku)
                                                    {{ $subjekbuku->nama }}
                                                @endforeach
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Jenis Buku</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            {{ $donasi->jenis_buku->koleksi_buku->nama }} - {{ $donasi->jenis_buku->nama }}
                                        </div>
                                    </td>
                                </tr>
                                @if ($donasi->id_prodi != null)
                                    <tr>
                                        <td class="col-md-3 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Program Studi</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-8 col-7 align-top">
                                            <div class="px-2 py-1">
                                                {{ $donasi->prodi->nama }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Fakultas</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-8 col-7 align-top">
                                            <div class="px-2 py-1">
                                                {{ $donasi->prodi->fakultas->nama }}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="col-md-4 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Deskripsi Fisik</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-7 col-7 align-top">
                                        <div class="px-2 py-1">
                                            @if($donasi->ilustrasi == null)
                                                -
                                            @else
                                                {{ $donasi->ilustrasi }}
                                            @endif
                                            |
                                            @if($donasi->dimensi == null)
                                                -
                                            @else
                                                {{ $donasi->dimensi }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-4 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Jumlah Buku</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-7 col-7 align-top">
                                        <div class="px-2 py-1">
                                            {{ $donasi->jml_eksemplar }} Buku
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-info"><span><iconify-icon icon="bxs:book" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Abstrak / Ringkasan Buku</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="col-md-12 col-12">
                                        <div class="px-2 pt-1">
                                            <div class="overflow-auto" style="height: 255px" id="vertical-example">
                                                {!! $donasi->ringkasan !!}
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
    <div class="row">
        <div class="col-md-12 col-lg-6 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-danger"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Pengarang</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="overflow-auto" style="height: 150px" id="vertical-example">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Nama</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            @foreach ($donasi->pengarang_place as $pengarangbuku)
                                                <div class="px-2 py-1">
                                                    {{ucfirst(trans($pengarangbuku->nama))}}
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @foreach ($donasi->jenis_buku->file_place as $field)
                                        @if($field->nama == 'Pembimbing')
                                            <tr>
                                                <td class="col-md-4 col-4 align-top">
                                                    <div class="px-2 py-1">
                                                        <strong>Pembimbing</strong>
                                                    </div>
                                                </td>
                                                <td class="col-md-1 col-1 align-top">
                                                    <div class="px-2 py-1">
                                                        <strong>:</strong>
                                                    </div>
                                                </td>
                                                <td class="col-md-7 col-7 align-top">
                                                    @foreach ($donasi->pembimbing_place as $pembimbingbuku)
                                                        <div class="px-2 py-1">
                                                            {{ $pembimbingbuku->nama }}
                                                        </div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                        @if($field->nama == 'Penyunting')
                                            <tr>
                                                <td class="col-md-4 col-4 align-top">
                                                    <div class="px-2 py-1">
                                                        <strong>Penyunting</strong>
                                                    </div>
                                                </td>
                                                <td class="col-md-1 col-1 align-top">
                                                    <div class="px-2 py-1">
                                                        <strong>:</strong>
                                                    </div>
                                                </td>
                                                <td class="col-md-7 col-7 align-top">
                                                    @if($donasi->penyunting == null)
                                                        <div class="px-2 py-1">
                                                            -
                                                        </div>
                                                    @else
                                                        <div class="px-2 py-1">
                                                            {{ $donasi->penyunting }}
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                        @if($field->nama == 'Penerjemah')
                                            <tr>
                                                <td class="col-md-4 col-4 align-top">
                                                    <div class="px-2 py-1">
                                                        <strong>Penerjemah</strong>
                                                    </div>
                                                </td>
                                                <td class="col-md-1 col-1 align-top">
                                                    <div class="px-2 py-1">
                                                        <strong>:</strong>
                                                    </div>
                                                </td>
                                                <td class="col-md-7 col-7 align-top">
                                                    @if($donasi->penerjemah == null)
                                                        <div class="px-2 py-1">
                                                            -
                                                        </div>
                                                    @else
                                                        <div class="px-2 py-1">
                                                            {{ $donasi->penerjemah }}
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-warning"><span><iconify-icon icon="bxs:buildings" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Penerbit</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="overflow-auto" style="height: 150px" id="vertical-example">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Nama</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            <div class="px-2 py-1">
                                                @if($donasi->penerbit != null)
                                                    {{ $donasi->penerbit }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Kota</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            <div class="px-2 py-1">
                                                {{ $donasi->kota_terbit }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Tahun</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            <div class="px-2 py-1">
                                                {{ $donasi->tahun_terbit }}
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
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        @guest
                            @if (Route::has('login'))
                            @endif
                        @else
                            @foreach ($donasi->file as $filebuku)
                                @if($filebuku->file_place->tipe == 'pdf')
                                    <div class="p-2">
                                        <span class="badge bg-dark"><span><iconify-icon icon="bxs:file" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; {{ $filebuku->file_place->nama }}</span>
                                    </div>
                                    <div class="px-2 py-1">
                                        <iframe src="{{ route('pdfDonasi', ['id' => $donasi->id, 'originalname' => $filebuku->original_name]) }}" frameborder="0" width="100%" height="550"></iframe>
                                    </div>
                                @elseif($filebuku->file_place->tipe == 'fullfile')
                                    <div class="p-2">
                                        <span class="badge bg-dark"><span><iconify-icon icon="bxs:file" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Full File</span>
                                    </div>
                                    <div class="px-2 py-1">
                                        <iframe src="{{ route('pdfDonasi', ['id' => $donasi->id, 'originalname' => $filebuku->original_name]) }}" frameborder="0" width="100%" height="550"></iframe>
                                    </div>
                                @endif
                            @endforeach
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-primary"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Data Donatur</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="overflow-auto" style="height: 150px" id="vertical-example">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Nama Lengkap</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            <div class="px-2 py-1 text-capitalize">
                                                {{ $donasi->anggota->nama_lengkap }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Email</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            <div class="px-2 py-1">
                                                {{ $donasi->anggota->user->email }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Alamat Rumah</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            <div class="px-2 py-1">
                                                {{ $donasi->anggota->alamat }}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="overflow-auto" style="height: 150px" id="vertical-example">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Jenis Keanggotaan</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            <div class="px-2 py-1">
                                                {{ $donasi->anggota->jenis_keanggotaan->nama }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Nomor Handphone</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            <div class="px-2 py-1">
                                                {{ $donasi->anggota->no_hp }}
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
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6 mb-2 d-grid gap-2 mt-3">
            <form action="{{ route('donasi-admin.checkberhasil', ['donasi_admin_berhasil' => $donasi->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-primary btn-lg text-white" style="width: 100%;">
                    Approve
                </button>
            </form>
        </div>
        <div class="col-md-12 col-lg-6 mb-2 d-grid gap-2 mt-3">
            <a class="btn btn-danger btn-lg text-white" data-bs-toggle="modal" data-bs-target="#modalDecline">
                Reject
            </a>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        tinymce.init({
            selector: "#pesan",
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
@endsection
