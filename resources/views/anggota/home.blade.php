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
    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Pencarian Detail Katalog</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Jenis Buku</label>
                <input
                    type="text"
                    id="nameWithTitle"
                    class="form-control"
                    placeholder="Enter Book Type"
                />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Judul Buku</label>
                <input
                    type="text"
                    id="nameWithTitle"
                    class="form-control"
                    placeholder="Enter The Book Title"
                />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Kode Buku</label>
                <input
                    type="text"
                    id="nameWithTitle"
                    class="form-control"
                    placeholder="Enter The Book Code"
                />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Nama Pengarang</label>
                <input
                    type="text"
                    id="nameWithTitle"
                    class="form-control"
                    placeholder="Enter The Author's Name"
                />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Nama Penyunting</label>
                <input
                    type="text"
                    id="nameWithTitle"
                    class="form-control"
                    placeholder="Enter An Editor Name"
                />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Nama Penerbit</label>
                <input
                    type="text"
                    id="nameWithTitle"
                    class="form-control"
                    placeholder="Enter The Publisher Name"
                />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Subjek</label>
                <input
                    type="text"
                    id="nameWithTitle"
                    class="form-control"
                    placeholder="Enter Subject"
                />
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                Close
            </button>
            <button type="button" class="btn btn-primary">Search</button>
            </div>
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
                        <div class="item">
                            <div class="work">
                                <a href="#">
                                    <div
                                        class="img d-flex align-items-end justify-content-center"
                                        style="background-image: url({{ asset('assets/img/home/2.jpg') }});
                                            background-repeat: no-repeat;
                                                backround-size: cover; "
                                    >
                                        <div class="text w-100" style="background-color: rgba(0,0,0, 0.5); padding-top: 10px;">
                                            <span class="cat">Web Design</span>
                                            <h3>Working Spaces for Startups Freelancer</a></h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="work">
                                <a href="#">
                                    <div
                                        class="img d-flex align-items-end justify-content-center"
                                        style="background-image: url({{ asset('assets/img/home/1.png') }});
                                            background-repeat: no-repeat;
                                                backround-size: cover; "
                                    >
                                        <div class="text w-100" style="background-color: rgba(0,0,0, 0.5); padding-top: 10px;">
                                            <span class="cat">Web Design</span>
                                            <h3>Working Spaces for Startups Freelancer</a></h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
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
