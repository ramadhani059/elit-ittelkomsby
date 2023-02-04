@extends('layout.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold">Akses Jurnal/</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" href="{{ route('information-admin.create')}}" role="button" aria-haspopup="true" aria-expanded="false">
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
                <th><strong>Judul</strong></th>
                <th><strong>Author</strong></th>
                <th><strong>Tanggal</strong></th>
                <th><strong>Status</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($info as $information)
              <tr class="text-nowrap">
                <td><strong>{{ $loop->iteration }}</strong></td>
                <td>
                    {{ $information->judul }}
                </td>
                <td>
                   {{ $information->admin->nama_lengkap }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($information->tanggal)->format('d/m/Y')}}
                </td>
                <td>
                    {{ $information->status }}
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-primary me-2" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Show</span>" href="{{ route('information-admin.show', ['information_admin' => $information->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:show" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        <a class="btn btn-icon btn-sm btn-dark me-2" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Edit</span>" href="{{ route('information-admin.edit', ['information_admin' => $information->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:edit" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        <form action="{{ route('information-admin.destroy', ['information_admin' => $information->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Delete</span>" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="{{ $information->judul }}" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
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
    {{ $info->links('layout.pagination') }}
</div>

@endsection
