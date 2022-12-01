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
                <form class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade " id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
    <hr/>
    <section class="pb-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="featured-carousel owl-carousel">
                        @foreach ($buku as $buku)
                            <div class="item">
                                <div class="work">
                                    <a href="{{ route('catalog.detail', ['kodebuku' => $buku->kode_buku]) }}" role="button">
                                        <div
                                            class="img d-flex align-items-end justify-content-center"
                                            style="background-image: url(
                                                @if ($buku->file->cover_encrypt != null)
                                                    {{ asset('storage/buku/cover/'.$buku->file->cover_encrypt) }}
                                                @else
                                                    {{ asset('assets/img/home/1.png') }}
                                                @endif
                                            );
                                                background-repeat: no-repeat;
                                                    backround-size: cover; "
                                        >
                                            <div class="text w-100" style="background-color: rgba(0,0,0, 0.5); padding-top: 10px; height: 100px;">
                                                <span class="cat">{{ $buku->subjek->nama }}</span>
                                                <h3>
                                                    <?php echo \Illuminate\Support\Str::limit(strip_tags($buku->judul), 55, $end='...') ?>
                                                </a></h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Card Groups -->
    <div class="container-fluid">
        <div class="card-group mb-5">
            <div class="card pt-3">
                <div class="card-body">
                    <h5 class="card-title">Informasi Penting</h5>
                    <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content. This
                        content is a little bit longer.
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card pt-3">
                <div class="card-body">
                    <h5 class="card-title">News</h5>
                    <p class="card-text">
                        This card has supporting text below as a natural lead-in to additional content.
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card pt-3">
                <div class="card-body">
                    <h5 class="card-title">Akses Jurnal</h5>
                    <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content. This
                        card has even longer content than the first to show that equal height action.
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
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
