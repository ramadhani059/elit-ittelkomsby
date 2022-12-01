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
            <h5 class="fw-bold">Peminjaman Buku</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" href="{{ route('booking-admin.create' )}}" role="button" aria-haspopup="true" aria-expanded="false">
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
              @foreach ($booking as $booking)
              <tr class="text-nowrap">
                <td>{{ $booking->kode_booking }}</td>
                <td>
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($booking->buku->judul), 20, $end='...') ?>
                </td>
                <td>
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($booking->nama_peminjam), 15, $end='...') ?>
                </td>
                <td>
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($booking->email_peminjam), 15, $end='...') ?>
                </td>
                    @if ($booking->status == 'proses')
                        <td><span class="badge bg-label-warning me-1">Booked</span></td>
                    @elseif ($booking->status == 'dipinjam')
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                    @elseif ($booking->status == 'selesai')
                        <td><span class="badge bg-label-success me-1">Completed</span></td>
                    @elseif ($booking->status == 'dibatalkan')
                        <td><span class="badge bg-label-danger me-1">Canceled</span></td>
                    @else
                        <td><span class="badge bg-label-danger me-1">Gagal</span></td>
                    @endif
                </td>
                <td>
                    {{ $booking->total_denda }}
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="{{ route('booking-admin.show', ['booking_admin' => $booking->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="tf-icons bx bx-show"></span>
                        </a>
                        <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('booking-admin.edit', ['booking_admin' => $booking->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="tf-icons bx bx-edit"></span>
                        </a>
                        <a class="btn btn-icon btn-sm btn-danger me-2" data-toggle="tooltip" href="{{ route('booking-admin.selesai', ['booking_admin' => $booking->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="tf-icons bx bx-check"></span>
                        </a>
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
