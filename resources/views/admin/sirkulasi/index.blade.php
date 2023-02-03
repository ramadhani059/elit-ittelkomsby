@extends('layout.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">Katalog Buku/</span> Sirkulasi Buku</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" href="{{ route('sirkulasi.create' )}}" role="button" aria-haspopup="true" aria-expanded="false">
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
                <th><strong>Biaya Sewa</strong></th>
                <th><strong>Denda Harian</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($sirkulasi as $sirkulasis)
              <tr class="text-nowrap">
                <td><strong>{{ $loop->iteration }}</strong></td>
                <td>
                    {{ $sirkulasis->nama }}
                </td>
                <td>
                    Rp. {{ $sirkulasis->biaya_sewa }}
                </td>
                <td>
                    Rp. {{ $sirkulasis->denda_harian }}
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-dark me-2" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Edit</span>" href="{{ route('sirkulasi.edit', ['sirkulasi' => $sirkulasis->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:edit" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        @if($sirkulasis->buku->count('pivot.id_sirkulasi') != 0)
                            <a class="btn btn-icon btn-sm btn-danger btn-not-delete" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Delete</span>" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span>
                            </a>
                        @else
                            <form action="{{ route('sirkulasi.destroy', ['sirkulasi' => $sirkulasis->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Delete</span>" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="{{ $sirkulasis->nama }}" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
                            </form>
                        @endif
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

@section('script')

<script>
    $(document).ready(function () {
        // Sweet alert booking
        $(".booking").on("click", ".btn-not-delete", function (e) {
            e.preventDefault();

            var form = $(this).closest("form");
            var name = $(this).data("name");

            Swal.fire({
                title: "Maaf anda tidak bisa menghapus ini !",
                text: "Anda memiliki buku dengan sirkulasi ini",
                icon: "warning",
            });
        });
    });
</script>

@endsection
