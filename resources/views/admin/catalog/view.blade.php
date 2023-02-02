@extends('layout.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <div class="card">
                <div class="card-body mt-3 mx-2">
                    <h4 class="card-title fw-bolder text-capitalize">
                        {{ $catalog->judul }}
                    </h4>
                    <p class="card-text">
                        <div class="row media">
                            <div class="col-12">
                                <span><iconify-icon icon="bx:user" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                    @if ($catalog->pengarang_place->count('pivot.id_buku') != 1)
                                        @foreach ($catalog->pengarang_place->take(1) as $pengarangbuku)
                                            {{ $pengarangbuku->nama }}, dkk
                                        @endforeach
                                    @else
                                        @foreach ($catalog->pengarang_place->take(1) as $pengarangbuku)
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
                  src="@if ($catalog->cover != null)
                        {{ asset('storage/buku/cover/'.$catalog->cover) }}
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
                                            <strong>Kode Buku</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            {{ $catalog->kode_buku }}
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
                                        <div class="px-2 py-1">
                                            @if ($catalog->subjek_place->count('pivot.id_subjek') != 1)
                                                @foreach ($catalog->subjek_place as $subjekbuku)
                                                    {{ $subjekbuku->nama }},
                                                @endforeach
                                            @else
                                                @foreach ($catalog->subjek_place as $subjekbuku)
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
                                            {{ $catalog->jenis_buku->koleksi_buku->nama }} - {{ $catalog->jenis_buku->nama }}
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
                                    <td class="col-md-7 col-7 align-top">
                                        <div class="px-2 py-1">
                                            {{ $catalog->lokasi_buku }}
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
                                            @if($catalog->ilustrasi == null)
                                                -
                                            @else
                                                {{ $catalog->ilustrasi }}
                                            @endif
                                            |
                                            @if($catalog->dimensi == null)
                                                -
                                            @else
                                                {{ $catalog->dimensi }}
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
                                            {{ $catalog->eksemplar->count('pivot.id_buku') }} Buku
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
                                                {!! $catalog->ringkasan !!}
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
                                            @foreach ($catalog->pengarang_place as $pengarangbuku)
                                                <div class="px-2 py-1">
                                                    {{ucfirst(trans($pengarangbuku->nama))}}
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @foreach ($catalog->jenis_buku->file_place as $field)
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
                                                    @foreach ($catalog->pembimbing_place as $pembimbingbuku)
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
                                                    @if($catalog->penyunting == null)
                                                        <div class="px-2 py-1">
                                                            -
                                                        </div>
                                                    @else
                                                        <div class="px-2 py-1">
                                                            {{ $catalog->penyunting }}
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
                                                    @if($catalog->penerjemah == null)
                                                        <div class="px-2 py-1">
                                                            -
                                                        </div>
                                                    @else
                                                        <div class="px-2 py-1">
                                                            {{ $catalog->penerjemah }}
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
                                                @if($catalog->penerbit != null)
                                                    {{ $catalog->penerbit }}
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
                                                {{ $catalog->kota_terbit }}
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
                                                {{ $catalog->tahun_terbit }}
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
                                                {{ $catalog->sirkulasi->nama }}
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
                                                Rp. {{ $catalog->sirkulasi->biaya_sewa }}
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
                                                Rp. {{ $catalog->sirkulasi->denda_harian }}/hari
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
                            <div class="col-lg-6 col-6 text-end">
                                <a class="btn btn-sm btn-danger" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>&nbsp; Add
                                </a>
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
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($catalog->eksemplar as $eksemplar => $value)
                                    <tr>
                                        <th scope="row">{{ $eksemplar + 1 }}</th>
                                        <td>{{ $value->barcode }}</td>
                                        <td>{{ $value->kode_inventaris }}</td>
                                        <td>{{ \Carbon\Carbon::parse($value->tanggal_pengadaan)->format('d/m/Y')}}</td>
                                        <td>{{ucfirst(trans($value->jenis_sumber))}}</td>
                                        <td>{{ Str::ucfirst(Str::limit($value->status)) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span><iconify-icon icon="bxs:barcode" class="tf-icons bx"></iconify-icon></span>
                                                </a>
                                                <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span><iconify-icon icon="bx:edit" class="tf-icons bx"></iconify-icon></span>
                                                </a>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="#" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
                                                </form>
                                            </div>
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
                        @foreach ($catalog->file as $filebuku)
                            @if($filebuku->file_place->nama == 'File' && $filebuku->file_place->tipe == 'fullfile')
                                <div class="px-2 py-1">
                                    <iframe src="{{ route('pdf', ['id' => $catalog->id,'originalname' => $filebuku->original_name]) }}" frameborder="0" width="100%" height="550"></iframe>
                                </div>
                            @endif
                        @endforeach
                        <div class="p-2">
                            <span class="badge bg-dark"><span><iconify-icon icon="bxs:file" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; File</span>
                        </div>
                        @guest
                            @if (Route::has('login'))
                            @endif
                        @else
                            @foreach($file as $filebuku)
                                @if($filebuku->file_place->nama == 'File')
                                    <div class="row p-2 text-capitalize">
                                        <a href="{{ route('download', ['filename' => $filebuku->original_name]) }}">{{ $filebuku->buku->judul }}</a>
                                    </div>
                                @else
                                    <div class="row p-2">
                                        <a href="{{ route('download', ['filename' => $filebuku->original_name]) }}">{{ $filebuku->file_place->nama }}</a>
                                    </div>
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
