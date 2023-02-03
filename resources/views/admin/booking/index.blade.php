@extends('layout.admin')

@section('search-navbar')

<div class="navbar-nav align-items-center">
    <form class="d-flex" action="{{ route('searchpeminjaman.admin') }}" method="GET" id="form">
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
            <h5 class="fw-bold">Peminjaman Buku</h5>
        </div>
        {{-- Add, Eksport, dan Import --}}
        {{-- <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" href="{{ route('booking-admin.create' )}}" role="button" aria-haspopup="true" aria-expanded="false">
                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>&nbsp; Add
            </a>
            <a class="btn btn-sm btn-dark" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span><iconify-icon icon="bx:import" class="tf-icons bx"></iconify-icon></span>&nbsp; Import
            </a>
            <a class="btn btn-sm btn-danger" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span><iconify-icon icon="bx:export" class="tf-icons bx"></iconify-icon></span>&nbsp; Export
            </a>
        </div> --}}
    </div>

    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover mt-3 mb-3 datatable">
            <thead>
              <tr class="text-nowrap">
                <th><strong>Kode</strong></th>
                <th><strong>Judul</strong></th>
                <th><strong>Nama</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Status</strong></th>
                <th><strong>Denda</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($booking as $bookings)
              <tr class="text-nowrap">
                <td>{{ $bookings->kode_booking }}</td>
                <td class="text-capitalize">
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($bookings->eksemplar->buku->judul), 37, $end='...') ?>
                </td>
                <td>
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($bookings->nama_peminjam), 25, $end='...') ?>
                </td>
                <td>
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($bookings->email_peminjam), 25, $end='...') ?>
                </td>
                    @if ($bookings->status == 'proses')
                        <td><span class="badge bg-label-dark me-1">Booked</span></td>
                    @elseif ($bookings->status == 'dipinjam')
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                    @elseif ($bookings->status == 'selesai')
                        <td><span class="badge bg-label-success me-1">Completed</span></td>
                    @elseif ($bookings->status == 'dibatalkan')
                        <td><span class="badge bg-label-danger me-1">Canceled</span></td>
                    @else
                        <td><span class="badge bg-label-danger me-1">Gagal</span></td>
                    @endif
                </td>
                <td>
                    {{ $bookings->total_denda }}
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="{{ route('booking-admin.show', ['booking_admin' => $bookings->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:show" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('booking-admin.edit', ['booking_admin' => $bookings->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:edit" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        @if ($bookings->status == 'proses')
                            <form action="{{ route('booking-admin.disetujui', ['booking_admin' => $bookings->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger" ><span><iconify-icon icon="bx:check" class="tf-icons bx"></iconify-icon></span></button>
                            </form>
                        @elseif ($bookings->status == 'dipinjam')
                            <form action="{{ route('booking-admin.selesai', ['booking_admin' => $bookings->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger" ><span><iconify-icon icon="bx:check" class="tf-icons bx"></iconify-icon></span></button>
                            </form>
                        @else
                            <a class="btn btn-icon btn-sm btn-danger disabled" data-toggle="tooltip" href="{{ route('booking-admin.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <span><iconify-icon icon="bx:check" class="tf-icons bx"></iconify-icon></span>
                            </a>
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
    {{ $booking->links('layout.pagination') }}
</div>

@endsection
