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
                <h4 class="fw-bolder my-2">Notifikasi</h4>
            </div>
            <div class="col-md-4 col-8">
                <form class="d-flex">
                    <div class="input-group">
                        <span class="input-group-text"><iconify-icon icon="bx:search" class="tf-icons bx"></iconify-icon></span>
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
                        {{-- @if($notifikasi->count() > 0) --}}
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover mt-3 mb-3 datahistory">
                                    <tbody class="table-border-bottom-0">
                                        <tr class="table-active">
                                            <td>Pratama Ramadhani Wijaya</td>
                                            <td><?php echo \Illuminate\Support\Str::limit(strip_tags('Donasi Buku dengan Judul "Rancang Bangun E-Katalog Berbasis Progressive Web Apps untuk Pengembangan Sistem Informasi Electronic Library ITTelkom Surabaya" sudah Terkirim'), 70, $end='...') ?></td>
                                            <td>24/12/2000</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-icon btn-sm btn-dark me-2" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Show</span>" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <span><iconify-icon icon="bx:show" class="tf-icons bx"></iconify-icon></span>
                                                    </a>
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Delete</span>" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="table-active">
                                            <td>Test 1</td>
                                            <td>Test 2</td>
                                            <td>Test 3</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-icon btn-sm btn-dark me-2" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Show</span>" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <span><iconify-icon icon="bx:show" class="tf-icons bx"></iconify-icon></span>
                                                    </a>
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="<span>Delete</span>" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        {{-- @else
                            <div class="col-12">
                                <div class="card-body text-center mt-4 mb-2">
                                    <h4 class="text-gray-900 font-weight-bold text-capitalize">Tidak ada notifikasi</h4>
                                </div>
                            </div>
                        @endif --}}
                    </div>
                    <!--/ Hoverable Table rows -->
                </div>
            </div>
        </div>
        {{-- {{ $info->links('layout.pagination') }} --}}
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
                    confirmButtonText: "Ya, Saya yakin !",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
