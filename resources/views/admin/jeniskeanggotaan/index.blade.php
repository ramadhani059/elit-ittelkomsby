@extends('layout.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">User/</span> Jenis Keanggotaan</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" href="{{ route('jenis-keanggotaan.create' )}}" role="button" aria-haspopup="true" aria-expanded="false">
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
                <th><strong>Nama</strong></th>
                <th><strong>Jumlah Institusi</strong></th>
                <th><strong>Jumlah User</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($jenisanggota as $jenisanggota)
              <tr class="text-nowrap">
                <td><strong>{{ $loop->iteration }}</strong></td>
                <td>
                    {{ $jenisanggota->nama }}
                </td>
                <td>
                    {{ $jenisanggota->institusi->count('pivot.tipe_institusi') }} Institusi
                </td>
                <td>
                    {{ $jenisanggota->anggota->count('pivot.id_jenis_keanggotaan') }} User
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="{{ route('jenis-keanggotaan.show', ['jenis_keanggotaan' => $jenisanggota->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:show" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('jenis-keanggotaan.edit', ['jenis_keanggotaan' => $jenisanggota->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:edit" class="tf-icons bx"></iconify-icon></span>
                        </a>

                        <form action="{{ route('jenis-keanggotaan.destroy', ['jenis_keanggotaan' => $jenisanggota->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="{{ $jenisanggota->nama }}" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
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
