@extends('layout.admin')

@section('search-navbar')

<div class="navbar-nav align-items-center">
    <form class="d-flex" action="{{ route('searchcatalog.admin') }}" method="GET" id="form">
        @csrf
        <div class="nav-item d-flex align-items-center">
            <iconify-icon icon="bx:search" class="fs-4 lh-0"></iconify-icon>
            <input
                type="text"
                name="searchbuku"
                value="{{ old('searchbuku') }}"
                class="form-control border-0 shadow-none"
                placeholder="Search..."
                aria-label="Search..."
            />
        </div>
    </form>
</div>

@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">Katalog Buku/</span> List Buku</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-dark" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span><iconify-icon icon="bx:import" class="tf-icons bx"></iconify-icon></span>&nbsp; Import
            </a>
            {{-- Export --}}
            {{-- <a class="btn btn-sm btn-danger" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span><iconify-icon icon="bx:export" class="tf-icons bx"></iconify-icon></span>&nbsp; Export
            </a> --}}
        </div>
    </div>

    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover mt-3 mb-3 datatable">
            <thead>
              <tr class="text-nowrap">
                <th><strong>Cover</strong></th>
                <th><strong>Kode Buku</strong></th>
                <th><strong>Judul</strong></th>
                <th><strong>Pengarang</strong></th>
                <th><strong>Penerbit</strong></th>
                <th><strong>Jenis Buku</strong></th>
                <th><strong>Status</strong></th>
                <th><strong>Jumlah Eksemplar</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($catalog as $catalogs)
              <tr class="text-nowrap">
                <td>
                    <img
                      class="img-fluid d-flex mx-auto"
                      src="@if ($catalogs->cover != null)
                            {{ asset('storage/buku/cover/'.$catalogs->cover) }}
                        @else
                            {{ asset('assets/img/home/1.png') }}
                        @endif"
                      alt="Card image cap"
                    />
                </td>
                <td>
                    {{ $catalogs->kode_buku }}
                </td>
                <td class="text-capitalize">
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($catalogs->judul), 37, $end='...') ?>
                </td>
                <td>
                    @if ($catalogs->pengarang_place->count('pivot.id_pengarang') != 1)
                        @foreach ($catalogs->pengarang_place->take(1) as $pengarangbuku)
                            {{ $pengarangbuku->nama }}, dkk
                        @endforeach
                    @else
                        @foreach ($catalogs->pengarang_place->take(1) as $pengarangbuku)
                            {{ $pengarangbuku->nama }}
                        @endforeach
                    @endif
                </td>
                <td>
                    {{ $catalogs->penerbit }}
                </td>
                <td>
                    {{ $catalogs->jenis_buku->nama }}
                </td>
                <td>
                    @if ($catalogs->status_active == 1)
                        Aktif
                    @else
                        Tidak Aktif
                    @endif
                </td>
                <td>{{ $catalogs->eksemplar->count('pivot.id_buku') }} Buku</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-primary me-2" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Show</span>" href="{{ route('catalog-admin.show', ['catalog_admin' => $catalogs->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:show" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        <a class="btn btn-icon btn-sm btn-dark me-2" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Edit</span>" href="{{ route('catalog-admin.edit', ['catalog_admin' => $catalogs->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:edit" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        <form action="{{ route('catalog-admin.destroy', ['catalog_admin' => $catalogs->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Delete</span>" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="{{ $catalogs->judul }}" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
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

    {{ $catalog->links('layout.pagination') }}
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
