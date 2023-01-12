@extends('layout.anggota')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-md-8 col-4">
                <h4 class="fw-bolder my-2">History Peminjaman Buku</h4>
            </div>
            <div class="col-md-4 col-8">
                <form class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-2">
                <div class="card">
                    <!-- Hoverable Table rows -->
                    <div class="card">
                        @if($booking->count() > 0)
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover mt-3 mb-3 datahistory">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th><strong>Kode</strong></th>
                                            <th><strong>Barcode</strong></th>
                                            <th><strong>Judul</strong></th>
                                            <th><strong>Pengarang</strong></th>
                                            <th><strong>Penerbit</strong></th>
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
                                                <?php echo \Illuminate\Support\Str::limit(strip_tags($bookings->eksemplar->buku->judul), 35, $end='...') ?>
                                            </td>
                                            <td>{{ $bookings->eksemplar->barcode }}</td>
                                            <td>
                                                @if ($bookings->eksemplar->buku->pengarang_place->count('pivot.id_pengarang') != 1)
                                                    @foreach ($bookings->eksemplar->buku->pengarang_place->take(1) as $pengarangbuku)
                                                        {{ $pengarangbuku->nama }}, dkk
                                                    @endforeach
                                                @else
                                                    @foreach ($bookings->eksemplar->buku->pengarang_place->take(1) as $pengarangbuku)
                                                        {{ $pengarangbuku->nama }}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                {{ $bookings->eksemplar->buku->penerbit }}
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
                                                    <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="{{ route('catalog.detail', ['slug' => $bookings->eksemplar->buku->slug]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <span class="tf-icons bx bx-show"></span>
                                                    </a>
                                                    @if ($bookings->status == 'proses')
                                                        <form action="{{ route('history.cancel', ['history_cancel' => $bookings->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger btn-cancel"><span class="tf-icons bx bx-x"></span></button>
                                                        </form>
                                                    @else
                                                        <a class="btn btn-icon btn-sm btn-danger disabled" data-toggle="tooltip" href="{{ route('history.index') }}" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <span class="tf-icons bx bx-x"></span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="col-12">
                                <div class="card-body text-center mt-4 mb-2">
                                    <h4 class="text-gray-900 font-weight-bold text-capitalize">Tidak ada riwayat peminjaman</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!--/ Hoverable Table rows -->
                </div>
            </div>
        </div>
        {{ $booking->links('layout.pagination') }}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            // Sweet alert booking
            $(".datahistory").on("click", ".btn-cancel", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Apakah Anda Yakin Ingin Membatalkan Pemesanan Ini ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-danger",
                    confirmButtonText: "Yes, I'am Sure !",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
