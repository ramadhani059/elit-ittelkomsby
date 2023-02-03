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
                        <h4 class="card-title fw-bolder text-capitalize">
                            {{ $buku->judul }}
                        </h4>
                        <p class="card-text">
                            <div class="row media">
                                <div class="col-12 text-capitalize">
                                    <span><iconify-icon icon="bx:user" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                    @if ($buku->pengarang_place->count('pivot.id_pengarang') != 1)
                                        @foreach ($buku->pengarang_place->take(1) as $pengarangbuku)
                                            {{ $pengarangbuku->nama }}, dkk
                                        @endforeach
                                    @else
                                        @foreach ($buku->pengarang_place->take(1) as $pengarangbuku)
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
                      src="@if ($buku->cover != null)
                            {{ asset('storage/buku/cover/'.$buku->cover) }}
                        @else
                            {{ asset('assets/img/home/1.png') }}
                        @endif"
                      alt="Card image cap"
                    />
                  </div>
                  @guest
                    @if (Route::has('login'))
                        <div class="d-grid gap-2 col-lg-12 px-4 mt-1 mb-3 booking">
                            <button type="submit" data-toggle="tooltip" class="btn btn-secondary btn-belum-login" style="width: 100%" >Booking</button>
                        </div>
                    @endif
                  @else
                    @if ($bookable == 0)
                        <div class="d-grid gap-2 col-lg-12 px-4 mt-1 mb-3 booking">
                            <button type="submit" data-toggle="tooltip" class="btn btn-secondary btn-role-booking" style="width: 100%" >Booking</button>
                        </div>
                    @else
                        @if  ( Auth::user() -> level == 'admin' )
                            <div class="d-grid gap-2 col-lg-12 px-4 mt-1 mb-3 booking">
                                <form action="#" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" data-toggle="tooltip" class="btn btn-primary btn-role-booking" style="width: 100%" disabled >Booking</button>
                                </form>
                            </div>
                        @else
                            @if ( Auth::user() -> anggota -> verifikasi != 'Terverifikasi' )
                                <div class="d-grid gap-2 col-lg-12 px-4 mt-1 mb-3 booking">
                                    <button type="submit" data-toggle="tooltip" class="btn btn-secondary btn-belum-verifikasi" style="width: 100%" >Booking</button>
                                </div>
                            @else
                                @if( $bataspinjam >= Auth::user() -> anggota -> jenis_keanggotaan -> jumlah_pinjam)
                                    <div class="d-grid gap-2 col-lg-12 px-4 mt-1 mb-3 booking">
                                        <button type="submit" data-toggle="tooltip" class="btn btn-secondary btn-batas-booking" style="width: 100%" >Booking</button>
                                    </div>
                                @else
                                    <div class="d-grid gap-2 col-lg-12 px-4 mt-1 mb-3 booking">
                                        <form action="{{ route('booking-anggota.pinjam', ['booking_anggota' => $buku->id]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" data-toggle="tooltip" class="btn btn-primary btn-booking" style="width: 100%" >Booking</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endif
                  @endguest
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
                                                <strong>Kode Buku</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-8 col-7 align_top">
                                            <div class="px-2 py-1">
                                                {{ $buku->kode_buku }}
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
                                        <td class="col-md-8 col-7 align-top">
                                            <div class="px-2 py-1 text-capitalize">
                                                @if ($buku->subjek_place->count('pivot.id_subjek') != 1)
                                                    @foreach ($buku->subjek_place as $subjekbuku)
                                                        {{ $subjekbuku->nama }},
                                                    @endforeach
                                                @else
                                                    @foreach ($buku->subjek_place->take(1) as $subjekbuku)
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
                                        <td class="col-md-8 col-7">
                                            <div class="px-2 py-1">
                                                {{ $buku->jenis_buku->koleksi_buku->nama }} - {{ $buku->jenis_buku->nama }}
                                            </div>
                                        </td>
                                    </tr>
                                    @if ($buku->id_prodi != null)
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
                                                    {{ $buku->prodi->nama }}
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
                                                    {{ $buku->prodi->fakultas->nama }}
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
                                                @if($buku->ilustrasi == null)
                                                    -
                                                @else
                                                    {{ $buku->ilustrasi }}
                                                @endif
                                                |
                                                @if($buku->dimensi == null)
                                                    -
                                                @else
                                                    {{ $buku->dimensi }}
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
                                                    {!! $buku->ringkasan !!}
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
                                                @foreach ($buku->pengarang_place as $pengarangbuku)
                                                    <div class="px-2 py-1">
                                                        {{ucfirst(trans($pengarangbuku->nama))}}
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        @foreach ($buku->jenis_buku->file_place as $field)
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
                                                    @foreach ($buku->pembimbing_place as $pembimbingbuku)
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
                                                    @if($buku->penyunting == null)
                                                        <div class="px-2 py-1">
                                                            -
                                                        </div>
                                                    @else
                                                        <div class="px-2 py-1">
                                                            {{ $buku->penyunting }}
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
                                                    @if($buku->penerjemah == null)
                                                        <div class="px-2 py-1">
                                                            -
                                                        </div>
                                                    @else
                                                        <div class="px-2 py-1">
                                                            {{ $buku->penerjemah }}
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
            <div class="col-md-12 col-lg-4 mb-2">
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
                                                    @if($buku->penerbit != null)
                                                        {{ $buku->penerbit }}
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
                                <span class="badge bg-dark"><span><iconify-icon icon="bxs:bookmark" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Sirkulasi</span>
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
                        <div class="row align-items-center p-2">
                            <div class="col-lg-6 col-6">
                                <span class="badge bg-primary"><span><iconify-icon icon="bxs:book" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Detail Eksemplar</span>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                              <thead>
                                <tr class="text-nowrap">
                                  <th>#</th>
                                  <th>Barcode</th>
                                  <th>Kode Investasi</th>
                                  <th>Tanggal Pengadaan</th>
                                  <th>Sumber Pengadaan</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($buku->eksemplar as $eksemplar => $value)
                                    <tr>
                                        <th scope="row">{{ $eksemplar + 1 }}</th>
                                        <td>{{ $value->barcode }}</td>
                                        <td>{{ $value->kode_inventaris }}</td>
                                        <td>{{ \Carbon\Carbon::parse($value->tanggal_pengadaan)->format('d/m/Y')}}</td>
                                        <td>
                                            <p class="text-capitalize">
                                                {{$value->jenis_sumber}}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-capitalize">
                                                {{ $value->status }}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
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
                                <span class="badge bg-dark"><span><iconify-icon icon="bxs:file" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Flipbook</span>
                            </div>
                            @guest
                                @if (Route::has('login'))
                                    <p class="text-capitalize p-2">
                                        Maaf anda tidak memiliki akses untuk membaca dokumen ini !!
                                    </p>
                                @endif
                            @else
                                @foreach ($buku->file as $filebuku)
                                    @if($filebuku->file_place->nama == 'File' && $filebuku->file_place->tipe == 'fullfile')
                                        @if (Auth::user() -> level == 'admin')
                                            <div class="px-2 py-1" oncontextmenu="return false;">
                                                <iframe src="{{ route('pdf', ['id' => $buku->id,'originalname' => $filebuku->original_name]) }}#toolbar=0" frameborder="0" width="100%" height="550"></iframe>
                                            </div>
                                        @else
                                            @if (Auth::user() -> anggota -> jenis_keanggotaan -> role_baca == 1 && Auth::user() -> anggota -> verifikasi == 'Terverifikasi')
                                                <div class="px-2 py-1" oncontextmenu="return false;">
                                                    <iframe src="{{ route('pdf', ['id' => $buku->id,'originalname' => $filebuku->original_name]) }}#toolbar=0" frameborder="0" width="100%" height="550"></iframe>
                                                </div>
                                            @else
                                                <p class="text-capitalize p-2">
                                                    Maaf anda tidak memiliki akses untuk membaca dokumen ini !!
                                                </p>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endguest
                            <div class="p-2">
                                <span class="badge bg-dark"><span><iconify-icon icon="bxs:file" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; File</span>
                            </div>
                            @guest
                                @if (Route::has('login'))
                                    <p class="text-capitalize p-2">
                                        Maaf anda tidak memiliki akses untuk mengunduh dokumen ini !!
                                    </p>
                                @endif
                            @else
                                @foreach($file as $filebuku)
                                    @if($filebuku->buku->role_download == 0)
                                        @if($filebuku->file_place->nama == 'File')
                                            <div class="row p-2 text-capitalize">
                                                <a href="#">{{ $filebuku->buku->judul }}</a>
                                            </div>
                                        @else
                                            <div class="row p-2">
                                                <a href="#">{{ $filebuku->file_place->nama }}</a>
                                            </div>
                                        @endif
                                    @else
                                        @if (Auth::user() -> level == 'admin')
                                            @if($filebuku->file_place->nama == 'File')
                                                <div class="row p-2 text-capitalize">
                                                    <a href="{{ route('download', ['filename' => $filebuku->original_name]) }}">{{ $filebuku->buku->judul }}</a>
                                                </div>
                                            @else
                                                <div class="row p-2">
                                                    <a href="{{ route('download', ['filename' => $filebuku->original_name]) }}">{{ $filebuku->file_place->nama }}</a>
                                                </div>
                                            @endif
                                        @else
                                            @if (Auth::user() -> anggota -> jenis_keanggotaan -> role_download == 1 && Auth::user() -> anggota -> verifikasi == 'Terverifikasi')
                                                @if($filebuku->file_place->nama == 'File')
                                                    <div class="row p-2 text-capitalize">
                                                        <a href="{{ route('download', ['filename' => $filebuku->original_name]) }}">{{ $filebuku->buku->judul }}</a>
                                                    </div>
                                                @else
                                                    <div class="row p-2">
                                                        <a href="{{ route('download', ['filename' => $filebuku->original_name]) }}">{{ $filebuku->file_place->nama }}</a>
                                                    </div>
                                                @endif
                                            @else
                                                @if($filebuku->file_place->nama == 'File')
                                                    <div class="row p-2 text-capitalize">
                                                        <a href="#">{{ $filebuku->buku->judul }}</a>
                                                    </div>
                                                @else
                                                    <div class="row p-2">
                                                        <a href="#">{{ $filebuku->file_place->nama }}</a>
                                                    </div>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            // Sweet alert booking
            $(".booking").on("click", ".btn-booking", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Apakah Anda Yakin Ingin Memesan Buku Ini ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-danger",
                    confirmButtonText: "Ya, Saya yakin !",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Warning Melampaui Batas Pinjam
            $(".booking").on("click", ".btn-batas-booking", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Maaf Anda Telah Melampaui Batas Pinjam/Pesan Buku",
                    icon: "error",
                    confirmButtonClass: "bg-danger",
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Warning Belum Terverifikasi
            $(".booking").on("click", ".btn-belum-verifikasi", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Maaf Anda Belum Terverifikasi",
                    icon: "error",
                    confirmButtonClass: "bg-danger",
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Warning Role Booking
            $(".booking").on("click", ".btn-role-booking", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Maaf Jenis Keanggotaan Anda Tidak Diperbolehkan Memesan/Meminjam Buku",
                    icon: "error",
                    confirmButtonClass: "bg-danger",
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Warning Role Booking
            $(".booking").on("click", ".btn-belum-login", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Maaf Anda Belum Login/Daftar",
                    icon: "error",
                    confirmButtonClass: "bg-danger",
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
