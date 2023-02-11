@extends('layout.anggota')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-md-8 col-7">
                <h4 class="fw-bolder my-2">Katalog Terbaru</h4>
            </div>
            <div class="col-md-4 col-5">
                <form class="d-flex" action="{{ route('search.catalog') }}" method="GET" id="form">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text"><iconify-icon icon="bx:search" class="tf-icons bx"></iconify-icon></span>
                        <input type="text" class="form-control" name="search_catalog" placeholder="Cari Judul, Kode, Pengarang, Subjek" value="{{ old('search_catalog') }}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Pop Up --}}
    {{-- <div class="modal fade " id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
              <a href="#">
                <img
                  class="img-fluid d-flex mx-auto"
                  src="{{ asset('assets/img/home/poster.jpg') }}"
                />
              </a>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div> --}}
    <hr/>
    <section class="pb-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="featured-carousel owl-carousel">
                        @foreach ($buku as $buku)
                            @if($buku->status_active == 1)
                                <div class="item">
                                    <div class="work">
                                        <a href="{{ route('catalog.detail', ['slug' => $buku->slug]) }}" role="button">
                                            <div
                                                class="img d-flex align-items-end justify-content-center"
                                                style="background-image: url(
                                                    @if ($buku->cover != null)
                                                        {{ asset('storage/buku/cover/'.$buku->cover) }}
                                                    @else
                                                        {{ asset('assets/img/home/1.png') }}
                                                    @endif
                                                );
                                                    background-repeat: no-repeat;
                                                        backround-size: cover; "
                                            >
                                                <div class="text w-100" style="background-color: rgba(0,0,0, 0.5); padding-top: 10px; height: 100px;">
                                                    <span class="cat">
                                                        @if ($buku->subjek_place->count('pivot.id_subjek') != 1)
                                                            @foreach ($buku->subjek_place->take(1) as $subjekbuku)
                                                                {{ $subjekbuku->nama }}
                                                            @endforeach
                                                        @else
                                                            @foreach ($buku->subjek_place->take(1) as $subjekbuku)
                                                                {{ $subjekbuku->nama }}
                                                            @endforeach
                                                        @endif
                                                    </span>
                                                    <h3 class="text-capitalize">
                                                        <?php echo \Illuminate\Support\Str::limit(strip_tags($buku->judul), 50, $end='...') ?>
                                                    </a></h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Card Groups -->
    <div class="container-fluid">
        <div class="card-group mb-5">
            <div class="card pt-2">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Informasi Penting</h5>
                    @foreach($info as $information)
                        @if ($information->status == 'Aktif')
                            <p class="card-text">
                                <a href="{{ route('informasi.detail', ['slug' => $information->slug]) }}">
                                    <span class="badge bg-danger me-2">{{ \Carbon\Carbon::parse($information->tanggal)->format('d/m/Y')}}</span><?php echo \Illuminate\Support\Str::limit(strip_tags($information->judul), 60, $end='...') ?>
                                </a>
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card pt-2">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Akses Jurnal</h5>
                    <div class="row">
                        @foreach($akses as $aksesjurnal)
                            <div class="col-md-4 col-6 p-2">
                                <a href="{{ $aksesjurnal->link }}" target="_blank">
                                    <img
                                    class="img-fluid d-flex mx-auto"
                                    src="{{ asset('storage/aksesjurnal/'.$aksesjurnal->img_encrypt) }}"
                                    />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#exampleModal').modal('show');
        });
    </script>
@endsection
