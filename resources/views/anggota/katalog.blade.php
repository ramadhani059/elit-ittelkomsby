@extends('layout.anggota')

@section('content')
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-md-8 col-4">
                <h4 class="fw-bolder my-2">Katalog</h4>
            </div>
            <div class="col-md-4 col-8">
                <form class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." />
                    </div>
                    <button type="button" class="btn btn-icon btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        <span class="tf-icons bx bxs-filter-alt"></span>
                    </button>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="card mb-3 p-2">
                    <div class="row g-0">
                        <div class="col-md-3 col-4">
                            <img class="card-img card-img-left" src="{{ asset('assets/img/home/1.png') }}" alt="Card image" />
                        </div>
                        <div class="col-md-9 col-8">
                            <div class="card-body mt-1">
                                <a href="#">
                                    <h5 class="card-title fw-bolder">
                                        <?php echo \Illuminate\Support\Str::limit(strip_tags('Rancang Bangun E-Katalog Berbasis Progressive Web Apps'), 35, $end='...') ?>
                                    </h5>
                                </a>
                                <p class="card-text">
                                    <div class="row media">
                                        <div class="col-12 mb-2">
                                            <span class="tf-icons bx bx-hash"></span>&nbsp; Kode Buku
                                        </div>
                                        <div class="col-12 mb-2">
                                            <span class="tf-icons bx bxs-user"></span>&nbsp; <?php echo \Illuminate\Support\Str::limit(strip_tags('Pratama Ramadhani Wijaya'), 18, $end='...') ?>
                                        </div>
                                        <div class="col-12 mb-2 media-body d-none d-lg-block ">
                                            <span class="tf-icons bx bxs-buildings"></span>&nbsp; <?php echo \Illuminate\Support\Str::limit(strip_tags('ITTelkom Surabaya, 2022'), 50, $end='...') ?>
                                        </div>
                                        <div class="col-12 mb-2 media-body d-none d-lg-block ">
                                            <span class="tf-icons bx bxs-bookmark"></span>&nbsp; Sirkulasi
                                        </div>
                                        <div class="col-12 media-body d-none d-lg-block ">
                                            <span class="tf-icons bx bxs-book"></span>&nbsp; Tersedia 2 Eksemplar
                                        </div>
                                    </div>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation" class="mt-3 mb-1">
                <ul class="pagination justify-content-center">
                  <li class="page-item prev">
                    <a class="page-link" href="javascript:void(0);"
                      ><i class="tf-icon bx bx-chevrons-left"></i
                    ></a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0);">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0);">2</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="javascript:void(0);">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0);">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0);">5</a>
                  </li>
                  <li class="page-item next">
                    <a class="page-link" href="javascript:void(0);"
                      ><i class="tf-icon bx bx-chevrons-right"></i
                    ></a>
                  </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
