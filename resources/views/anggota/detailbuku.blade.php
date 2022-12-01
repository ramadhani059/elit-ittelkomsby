@extends('layout.anggota')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-2">
                <div class="card">
                    <div class="card-body mt-3 mx-2">
                        <h4 class="card-title fw-bolder">
                            {{ $buku->judul }}
                        </h4>
                        <p class="card-text">
                            <div class="row media">
                                <div class="col-12">
                                    <span class="tf-icons bx bx-user"></span>&nbsp;
                                    @if ($buku->pengarang_place->count('pivot.id_pengarang') != 1)
                                        @foreach ($buku->pengarang_place->take(1) as $pengarangbuku)
                                            {{ $pengarangbuku->pengarang->nama }}, dkk
                                        @endforeach
                                    @else
                                        @foreach ($buku->pengarang_place->take(1) as $pengarangbuku)
                                            {{ $pengarangbuku->pengarang->nama }}
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
                      src="@if ($buku->file->cover_encrypt != null)
                            {{ asset('storage/buku/cover/'.$buku->file->cover_encrypt) }}
                        @else
                            {{ asset('assets/img/home/1.png') }}
                        @endif"
                      alt="Card image cap"
                    />
                  </div>
                  <div class="d-grid gap-2 col-lg-12 px-4 mt-1 mb-3">
                    <button
                        type="button"
                        class="btn btn-primary"
                    >
                        Booking
                    </button>
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
                                                <strong>Kode Buku</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-8 col-7">
                                            <div class="px-2 py-1">
                                                10.02.2538
                                            </div>
                                        </td>
                                    </tr>
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
                                        <td class="col-md-8 col-7">
                                            <div class="px-2 py-1">
                                                {{ $buku->subjek->nama }}
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
                                        <td class="col-md-8 col-7">
                                            <div class="px-2 py-1">
                                                {{ $buku->jenis_buku->koleksi_buku->nama }} - {{ $buku->jenis_buku->nama }}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Lokasi</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7">
                                            <div class="px-2 py-1">
                                                {{ $buku->lokasi_buku }}
                                            </div>
                                        </td>
                                    </tr>
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
                                                {{ $buku->ilustrasi }}
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
                                        <td class="col-md-7 col-7">
                                            <div class="px-2 py-1">
                                                {{ $buku->eksemplar->count('pivot.id_buku') }} Buku
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
                                                    {{$buku->ringkasan}}
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
            <div class="col-md-12 col-lg-4 mb-2">
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
                                                @foreach ($buku->pengarang_place as $pengarangbuku)
                                                    <div class="px-2 py-1">
                                                        {{ $pengarangbuku->pengarang->nama }}
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
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
                                                <div class="px-2 py-1">
                                                    {{ $buku->penyunting->nama }}
                                                </div>
                                            </td>
                                        </tr>
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
                                                <div class="px-2 py-1">
                                                    -
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
            <div class="col-md-12 col-lg-4 mb-2">
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
                                                    {{ $buku->penerbit->nama }}
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
                                                    {{ $buku->kota_terbit }}
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
                                                    {{ $buku->tahun_terbit }}
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
            <div class="col-md-12 col-lg-4 mb-2">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="p-2">
                                <span class="badge bg-dark"><span class="tf-icons bx bxs-bookmark"></span>&nbsp; &nbsp; Sirkulasi</span>
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
                                                    {{ $buku->sirkulasi->nama }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Harga Sewa</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    Rp. {{ $buku->sirkulasi->biaya_sewa }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Denda Harian</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    Rp. {{ $buku->sirkulasi->denda_harian }}
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
                            <div class="p-2">
                                <span class="badge bg-dark"><span class="tf-icons bx bxs-file"></span>&nbsp; &nbsp; Flipbook</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
