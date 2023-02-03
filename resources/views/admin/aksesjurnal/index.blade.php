@extends('layout.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold">Akses Jurnal/</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" href="{{ route('akses-jurnal.create' )}}" role="button" aria-haspopup="true" aria-expanded="false">
                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>&nbsp; Add
            </a>
        </div>
    </div>

    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover mt-3 mb-3 datatable">
            <thead>
              <tr class="text-nowrap">
                <th><strong>No.</strong></th>
                <th><strong>Gambar</strong></th>
                <th><strong>Nama</strong></th>
                <th><strong>Kategori</strong></th>
                <th><strong>Redirect</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($akses as $aksesjurnal)
              <tr class="text-nowrap">
                <td><strong>{{ $loop->iteration }}</strong></td>
                <td>
                    <img
                      class="img-fluid d-flex"
                      src="{{ asset('storage/aksesjurnal/'.$aksesjurnal->img_encrypt) }}"
                      alt="Akses Jurnal"
                      height="127"
                      width="221"
                    />
                </td>
                <td>
                   {{ $aksesjurnal->judul }}
                </td>
                <td>
                    {{ $aksesjurnal->kategori }}
                </td>
                <td>
                    <a href="{{ $aksesjurnal->link }}" target="_blank">
                        <?php echo \Illuminate\Support\Str::limit(strip_tags($aksesjurnal->link), 35, $end='...') ?>
                    </a>
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-dark me-2" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Edit</span>" href="{{ route('akses-jurnal.edit', ['akses_jurnal' => $aksesjurnal->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:edit" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        <form action="{{ route('akses-jurnal.destroy', ['akses_jurnal' => $aksesjurnal->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Delete</span>" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="{{ $aksesjurnal->judul }}" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
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
