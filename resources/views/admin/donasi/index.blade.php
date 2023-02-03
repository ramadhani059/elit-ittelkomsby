@extends('layout.admin')

@section('search-navbar')

<div class="navbar-nav align-items-center">
    <form class="d-flex" action="{{ route('searchdonasi.admin') }}" method="GET" id="form">
        @csrf
        <div class="nav-item d-flex align-items-center">
            <iconify-icon icon="bx:search" class="fs-4 lh-0"></iconify-icon>
            <input
                type="text"
                name="keyword"
                value="{{ old('keyword') }}"
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
            <h5 class="fw-bold"><span class="text-muted fw-light">Donasi Buku/</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
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
                <th><strong>Judul</strong></th>
                <th><strong>Donatur</strong></th>
                <th><strong>Pengarang</strong></th>
                <th><strong>Penerbit</strong></th>
                <th><strong>Jenis Buku</strong></th>
                <th><strong>Jumlah Eksemplar</strong></th>
                <th><strong>Status</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($donasi as $donasibuku)
              <tr class="text-nowrap">
                <td>
                    <img
                      class="img-fluid d-flex mx-auto"
                      src="@if ($donasibuku->cover != null)
                            {{ asset('storage/buku/cover/'.$donasibuku->cover) }}
                        @else
                            {{ asset('assets/img/home/1.png') }}
                        @endif"
                      alt="Card image cap"
                    />
                </td>
                <td class="text-capitalize">
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($donasibuku->judul), 60, $end='...') ?>
                </td>
                <td class="text-capitalize">
                    {{ $donasibuku->anggota->nama_lengkap }}
                </td>
                <td>
                    @if ($donasibuku->pengarang_place->count('pivot.id_pengarang') != 1)
                        @foreach ($donasibuku->pengarang_place->take(1) as $pengarangbuku)
                            {{ $pengarangbuku->nama }}, dkk
                        @endforeach
                    @else
                        @foreach ($donasibuku->pengarang_place->take(1) as $pengarangbuku)
                            {{ $pengarangbuku->nama }}
                        @endforeach
                    @endif
                </td>
                <td>
                    {{ $donasibuku->penerbit }}
                </td>
                <td>
                    {{ $donasibuku->jenis_buku->nama }}
                </td>
                <td>{{ $donasibuku->jml_eksemplar }} Buku</td>
                @if ($donasibuku->status_donasi == 'diajukan')
                    <td><span class="badge bg-label-dark me-1">Submited</span></td>
                @elseif ($donasibuku->status_donasi == 'diterima')
                    <td><span class="badge bg-label-primary me-1">Approve</span></td>
                @elseif ($donasibuku->status_donasi == 'selesai')
                    <td><span class="badge bg-label-success me-1">Completed</span></td>
                @elseif ($donasibuku->status_donasi == 'ditolak')
                    <td><span class="badge bg-label-danger me-1">Rejected</span></td>
                @elseif ($donasibuku->status_donasi == 'dibatalkan')
                    <td><span class="badge bg-label-danger me-1">Canceled</span></td>
                @else
                    <td><span class="badge bg-label-danger me-1">Gagal</span></td>
                @endif
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="{{ route('donasi-admin.show', ['donasi_admin' => $donasibuku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:show" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        @if ($donasibuku->status_donasi == 'diajukan')
                            <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('donasi-admin.check', ['donasi_admin' => $donasibuku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <span><iconify-icon icon="bx:check" class="tf-icons bx"></iconify-icon></span>
                            </a>
                        @elseif ($donasibuku->status_donasi == 'diterima')
                            <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('donasi-admin.edit', ['donasi_admin' => $donasibuku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <span><iconify-icon icon="bxs:file-export" class="tf-icons bx"></iconify-icon></span>
                            </a>
                            <a class="btn btn-icon btn-sm btn-danger me-2" data-toggle="tooltip" href="{{ route('BASerahTerima', ['id' => $donasibuku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <span><iconify-icon icon="bxs:file-pdf" class="tf-icons bx"></iconify-icon></span>
                            </a>
                        @elseif ($donasibuku->status_donasi == 'selesai')
                            <a class="btn btn-icon btn-sm btn-danger me-2" data-toggle="tooltip" href="{{ route('BASerahTerima', ['id' => $donasibuku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <span><iconify-icon icon="bxs:file-pdf" class="tf-icons bx"></iconify-icon></span>
                            </a>
                        @endif
                        <form action="{{ route('donasi-admin.destroy', ['donasi_admin' => $donasibuku->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="{{ $donasibuku->judul }}" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
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

    {{ $donasi->links('layout.pagination') }}
</div>

@endsection
