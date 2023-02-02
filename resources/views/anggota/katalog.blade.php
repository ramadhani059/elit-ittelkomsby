@extends('layout.anggota')

@section('content')
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-md-8 col-4">
                <h4 class="fw-bolder my-2">Katalog</h4>
            </div>
            <div class="col-md-4 col-8">
                <form class="d-flex" action="{{ route('search.catalog') }}" method="GET" id="form">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text"><iconify-icon icon="bx:search" class="tf-icons bx"></iconify-icon></span>
                        <input type="text" class="form-control" name="search_catalog" placeholder="Cari Judul, Kode, Pengarang, Subjek" value="{{ old('search_catalog') }}" />
                    </div>
                    <a type="button" class="btn btn-icon btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        <span><iconify-icon icon="bxs:filter-alt" class="tf-icons bx text-white"></iconify-icon></span>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <form class="d-flex" action="{{ route('filter.catalog') }}" method="GET">
        @csrf
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Pencarian Detail Katalog</h5>
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
                                <label for="nameWithTitle" class="form-label">Jenis Buku</label>
                                <div class="input-group">
                                    <select class="form-select jenis_buku @error('jenis_buku') is-invalid @enderror" id="jenis_buku" name="jenis_buku">
                                        <option>Please Select</option>
                                        @foreach ($jenisbuku as $jenis_buku)
                                            <option value="{{ $jenis_buku->id}}">{{ $jenis_buku->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <input
                                    type="text"
                                    id="judul"
                                    name="judul"
                                    class="form-control"
                                    placeholder="Enter The Book Title"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="kode" class="form-label">Kode Buku</label>
                                <input
                                    type="text"
                                    id="kode"
                                    name="kode"
                                    class="form-control"
                                    placeholder="Enter The Book Code"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="pengarang" class="form-label">Nama Pengarang</label>
                                <input
                                    type="text"
                                    id="pengarang"
                                    name="pengarang"
                                    class="form-control"
                                    placeholder="Enter The Author's Name"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="penyunting" class="form-label">Nama Penyunting / Pembimbing</label>
                                <input
                                    type="text"
                                    id="penyunting"
                                    name="penyunting"
                                    class="form-control"
                                    placeholder="Enter An Editor Name"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="penerbit" class="form-label">Nama Penerbit</label>
                                <input
                                    type="text"
                                    id="penerbit"
                                    name="penerbit"
                                    class="form-control"
                                    placeholder="Enter The Publisher Name"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="subjek" class="form-label">Subjek</label>
                                <input
                                    type="text"
                                    id="subjek"
                                    name="subjek"
                                    class="form-control"
                                    placeholder="Enter Subject"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <a type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">
                        Close
                    </a>
                    <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <hr/>
    <div class="container-fluid">
        <div class="row">
            @foreach ($buku as $databuku)
                @if($databuku->status_active == 1)
                    <div class="col-md-6 col-sm-6">
                        <div class="card mb-3 p-2">
                            <div class="row g-0">
                                <div class="col-md-3 col-4">
                                    @if ($databuku->cover != null)
                                        <img class="card-img card-img-left" src="{{ asset('storage/buku/cover/'.$databuku->cover) }}" alt="Card image" />
                                    @else
                                        <img class="card-img card-img-left" src="{{ asset('assets/img/home/1.png') }}" alt="Card image" />
                                    @endif
                                </div>
                                <div class="col-md-9 col-8">
                                    <div class="card-body mt-1">
                                        <a href="{{ route('catalog.detail', ['slug' => $databuku->slug]) }}" role="button">
                                            <h5 class="card-title fw-bolder text-capitalize">
                                                <?php echo \Illuminate\Support\Str::limit(strip_tags($databuku->judul), 35, $end='...') ?>
                                            </h5>
                                        </a>
                                        <p class="card-text">
                                            <div class="row media">
                                                <div class="col-12 mb-2">
                                                    <span><iconify-icon icon="bx:hash" class="tf-icons bx"></iconify-icon></span>&nbsp; {{ $databuku->kode_buku }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                                    @if ($databuku->pengarang_place->count('pivot.id_buku') != 1)
                                                        @foreach ($databuku->pengarang_place->take(1) as $pengarangbuku)
                                                            <?php echo \Illuminate\Support\Str::limit(strip_tags( $pengarangbuku->nama), 18, $end='...') ?>
                                                        @endforeach
                                                    @else
                                                        @foreach ($databuku->pengarang_place->take(1) as $pengarangbuku)
                                                            <?php echo \Illuminate\Support\Str::limit(strip_tags( $pengarangbuku->nama ), 18, $end='...') ?>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="col-12 mb-2 media-body d-none d-lg-block ">
                                                    <span><iconify-icon icon="bxs:buildings" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                                    @if($databuku->penerbit == null)
                                                        -
                                                    @else
                                                        <?php echo \Illuminate\Support\Str::limit(strip_tags($databuku->penerbit), 50, $end='...') ?>
                                                    @endif
                                                </div>
                                                <div class="col-12 mb-2 media-body d-none d-lg-block ">
                                                    <span><iconify-icon icon="bxs:bookmark" class="tf-icons bx"></iconify-icon></span>&nbsp; {{ $databuku->sirkulasi->nama }}
                                                </div>
                                                <div class="col-12 media-body d-none d-lg-block ">
                                                    <span><iconify-icon icon="bxs:book" class="tf-icons bx"></iconify-icon></span>&nbsp; Tersedia {{ $databuku->eksemplar->count('pivot.id_buku') }} dari {{ $databuku->eksemplar->count('pivot.id_buku') }} Eksemplar
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        {{ $buku->links('layout.pagination') }}
    </div>


@endsection

@section('script')

    <script>
        document.getElementById('body').onkeyup = function(e) {
            if (e.keyCode === 13) {
                document.getElementById('form').submit(); // your form has an id="form"
            }
            return true;
        }
    </script>
@endsection
