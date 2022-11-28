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
            <h5 class="fw-bold"><span class="text-muted fw-light">Katalog Buku/</span> Jenis Buku</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" href="{{ route('jenis-buku.create' )}}" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="tf-icons bx bx-plus"></span>&nbsp; Add
            </a>
        </div>
    </div>

    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover mt-3 mb-3">
            <thead>
              <tr class="text-nowrap">
                <th><strong>No.</strong></th>
                <th><strong>Nama</strong></th>
                <th><strong>Jenis Koleksi</strong></th>
                <th><strong>Jumlah Buku</strong></th>
                <th><strong>Role File</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($jenisbuku as $jenisbuku)
              <tr class="text-nowrap">
                <td><strong>{{ $loop->iteration }}</strong></td>
                <td>
                    {{ $jenisbuku->nama }}
                </td>
                <td>
                    {{ $jenisbuku->koleksi_buku->nama }}
                </td>
                <td>
                    {{ $jenisbuku->buku->count('pivot.id_jenis_buku') }} Buku
                </td>
                <td>
                    @if ($jenisbuku->role_file == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('jenis-buku.edit', ['jenis_buku' => $jenisbuku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="tf-icons bx bx-edit"></span>
                        </a>
                        <form action="{{ route('jenis-buku.destroy', ['jenis_buku' => $jenisbuku->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger" data-name="{{ $jenisbuku->nama }}" ><span class="tf-icons bx bx-trash"></span></button>
                        </form>
                    </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
    </div>
    <!--/ Hoverable Table rows -->
</div>

@endsection
