@extends('layout.admin')

@section('search-navbar')

<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Search..."
        aria-label="Search..."
      />
    </div>
</div>

@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">Katalog Buku/</span> List Buku</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" href="{{ route('catalog-admin.create' )}}" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="tf-icons bx bx-plus"></span>&nbsp; Add
            </a>
            <a class="btn btn-sm btn-dark" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="tf-icons bx bx-import"></span>&nbsp; Import
            </a>
            <a class="btn btn-sm btn-danger" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="tf-icons bx bx-export"></span>&nbsp; Export
            </a>
        </div>
    </div>

    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover mt-3 mb-3">
            <thead>
              <tr class="text-nowrap">
                <th><strong>No</strong></th>
                <th><strong>Cover</strong></th>
                <th><strong>Judul</strong></th>
                <th><strong>Pengarang</strong></th>
                <th><strong>Penerbit</strong></th>
                <th><strong>Jenis Buku</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr class="text-nowrap">
                <th scope="row"><i class="fab fa-angular fa-lg text-danger"></i> <strong>1.</strong></th>
                <td>Image</td>
                <td>
                    <?php echo \Illuminate\Support\Str::limit(strip_tags('Isekai Wa Smartphone To Tomo Ni'), 20, $end='...') ?>
                </td>
                <td>Patora Fuyuhara</td>
                <td>Kadokawa Shoten</td>
                <td>Buku Sirkulasi</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="tf-icons bx bx-show"></span>
                        </a>
                        <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="tf-icons bx bx-edit"></span>
                        </a>
                        <form action="#" method="POST">
                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger" ><span class="tf-icons bx bx-trash"></span></button>
                        </form>
                    </div>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
    </div>
    <!--/ Hoverable Table rows -->
</div>

@endsection
