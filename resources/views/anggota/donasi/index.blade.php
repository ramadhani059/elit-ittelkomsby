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
                <h4 class="fw-bolder my-2">Donasi Buku</h4>
            </div>
            <div class="col-md-4 col-8">
                <form class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." />
                    </div>
                    <a class="btn btn-icon btn-primary ms-2" data-toggle="tooltip" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('donasibuku.create') }}">
                        <span class="tf-icons bx bx-plus"></span>
                    </a>
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
                        @if($donasi->count() > 0)
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover mt-3 mb-3 datadonasi">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th><strong>Cover</strong></th>
                                            <th><strong>Judul</strong></th>
                                            <th><strong>Pengarang</strong></th>
                                            <th><strong>Penerbit</strong></th>
                                            <th><strong>Jenis Buku</strong></th>
                                            <th><strong>Jumlah Eksemplar</strong></th>
                                            <th><strong>Status</strong></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($donasi as $donasiku)
                                        <tr class="text-nowrap">
                                            <td>
                                                <img
                                                    class="img-fluid d-flex mx-auto"
                                                    src="@if ($donasiku->cover != null)
                                                            {{ asset('storage/buku/cover/'.$donasiku->cover) }}
                                                        @else
                                                            {{ asset('assets/img/home/1.png') }}
                                                        @endif"
                                                    alt="Card image cap"
                                                />
                                            </td>
                                            <td class="text-capitalize">
                                                <?php echo \Illuminate\Support\Str::limit(strip_tags($donasiku->judul), 60, $end='...') ?>
                                            </td>
                                            <td>
                                                @if ($donasiku->pengarang_place->count('pivot.id_pengarang') != 1)
                                                    @foreach ($donasiku->pengarang_place->take(1) as $pengarangbuku)
                                                        {{ $pengarangbuku->nama }}, dkk
                                                    @endforeach
                                                @else
                                                    @foreach ($donasiku->pengarang_place->take(1) as $pengarangbuku)
                                                        {{ $pengarangbuku->nama }}
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                {{ $donasiku->penerbit }}
                                            </td>
                                            <td>
                                                {{ $donasiku->jenis_buku->nama }}
                                            </td>
                                            <td>
                                                {{ $donasiku->jml_eksemplar }} Buku
                                            </td>
                                            @if ($donasiku->status_donasi == 'diajukan')
                                                    <td><span class="badge bg-label-dark me-1">Submited</span></td>
                                                @elseif ($donasiku->status_donasi == 'diterima')
                                                    <td><span class="badge bg-label-primary me-1">Approve</span></td>
                                                @elseif ($donasiku->status_donasi == 'selesai')
                                                    <td><span class="badge bg-label-success me-1">Completed</span></td>
                                                @elseif ($donasiku->status_donasi == 'ditolak')
                                                    <td><span class="badge bg-label-danger me-1">Rejected</span></td>
                                                @elseif ($donasiku->status_donasi == 'dibatalkan')
                                                    <td><span class="badge bg-label-danger me-1">Canceled</span></td>
                                                @else
                                                    <td><span class="badge bg-label-danger me-1">Gagal</span></td>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="{{ route('donasibuku.show', ['donasibuku' => $donasiku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <span class="tf-icons bx bx-show"></span>
                                                    </a>
                                                    @if ($donasiku->status_donasi == 'diajukan')
                                                        <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('donasibuku.edit', ['donasibuku' => $donasiku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <span class="tf-icons bx bx-edit"></span>
                                                        </a>
                                                        <form action="{{ route('donasibuku.cancel', ['donasi_cancel' => $donasiku->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger btn-cancel"><span class="tf-icons bx bx-x"></span></button>
                                                        </form>
                                                    @elseif($donasiku->status_donasi == 'diterima')
                                                        <a class="btn btn-icon btn-sm btn-danger me-2" data-toggle="tooltip" href="{{ route('BASerahTerima', ['id' => $donasiku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <span class="tf-icons bx bxs-file-pdf"></span>
                                                        </a>
                                                    @elseif($donasiku->status_donasi == 'selesai')
                                                        <a class="btn btn-icon btn-sm btn-danger" data-toggle="tooltip" href="{{ route('BASerahTerima', ['id' => $donasiku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <span class="tf-icons bx bxs-file-pdf"></span>
                                                        </a>
                                                    @elseif($donasiku->status_donasi == 'ditolak')
                                                        <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('donasibuku.edit', ['donasibuku' => $donasiku->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <span class="tf-icons bx bx-edit"></span>
                                                        </a>
                                                        <form action="{{ route('donasibuku.cancel', ['donasi_cancel' => $donasiku->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger btn-cancel"><span class="tf-icons bx bx-x"></span></button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('donasibuku.destroy', ['donasibuku' => $donasiku->id]) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="{{ $donasiku->judul }}" ><span class="tf-icons bx bx-trash"></span></button>
                                                        </form>
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
                                    <h4 class="text-gray-900 font-weight-bold text-capitalize">Tidak ada riwayat donasi buku</h4>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!--/ Hoverable Table rows -->
                </div>
            </div>
        </div>
        {{ $donasi->links('layout.pagination') }}
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            // Sweet alert booking
            $(".datadonasi").on("click", ".btn-cancel", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Apakah Anda Yakin Ingin Membatalkan Donasi Ini ?",
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

            // Sweet alert delete
            $(".datadonasi").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Apakah Anda Yakin Ingin Menghapus Donasi Ini ?",
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
