@extends('layout.admin')

@section('content')
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
                                <span class="tf-icons bx bx-user"></span>&nbsp;
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
                            <span class="badge bg-primary"><span class="tf-icons bx bxs-book"></span>&nbsp; &nbsp; Informasi Umum</span>
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
                            <span class="badge bg-info"><span class="tf-icons bx bxs-book"></span>&nbsp; &nbsp; Abstrak / Ringkasan Buku</span>
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
                            <span class="badge bg-danger"><span class="tf-icons bx bxs-user"></span>&nbsp; &nbsp; Pengarang</span>
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
                                        @if($field->name == 'Pembimbing')
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
                                        @if($field->name == 'Penyunting')
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
                                        @if($field->name == 'Penerjemah')
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
                            <span class="badge bg-warning"><span class="tf-icons bx bxs-buildings"></span>&nbsp; &nbsp; Penerbit</span>
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
                                @if($filebuku->file_place->type == 'pdf')
                                    <div class="p-2">
                                        <span class="badge bg-dark"><span class="tf-icons bx bxs-file"></span>&nbsp; &nbsp; {{ $filebuku->file_place->name }}</span>
                                    </div>
                                    <div class="px-2 py-1">
                                        <iframe src="{{ route('pdfDonasi', ['id' => $donasi->id, 'originalname' => $filebuku->original_name]) }}" frameborder="0" width="100%" height="550"></iframe>
                                    </div>
                                @elseif($filebuku->file_place->type == 'fullfile')
                                    <div class="p-2">
                                        <span class="badge bg-dark"><span class="tf-icons bx bxs-file"></span>&nbsp; &nbsp; Full File</span>
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
                            <span class="badge bg-primary"><span class="tf-icons bx bxs-user"></span>&nbsp; &nbsp; Data Donatur</span>
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
</div>

@endsection
