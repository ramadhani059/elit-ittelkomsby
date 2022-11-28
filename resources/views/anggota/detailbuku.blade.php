@extends('layout.anggota')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/anggota/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-2">
                <div class="card">
                    <div class="card-body mt-3 mx-2">
                        <h4 class="card-title fw-bolder">
                            Rancang Bangun E-Katalog Berbasis Progressive Web Apps Untuk Pengembangan Sistem Informasi Electronic Library ITTelkom Surabaya
                        </h4>
                        <p class="card-text">
                            <div class="row media">
                                <div class="col-12">
                                    <span class="tf-icons bx bx-user"></span>&nbsp; Pratama Ramadhani Wijaya
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-3 mb-2">
                <div class="card">
                  <div class="card-body">
                    <img
                      class="img-fluid d-flex mx-auto"
                      src="{{ asset('assets/img/home/2.jpg') }}"
                      alt="Card image cap"
                    />
                  </div>
                  <div class="d-grid gap-2 col-lg-12 px-4 mt-1 mb-3">
                    <button type="button" class="btn btn-primary">Booking</button>
                  </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9 mb-2">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="p-2">
                                <span class="badge bg-primary"><span class="tf-icons bx bxs-book"></span>&nbsp; &nbsp; Informasi Umum</span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="col-md-3 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Kode Buku</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-8 col-7">
                                            <div class="px-2 py-1">
                                                10.02.2538
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Subjek</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-8 col-7">
                                            <div class="px-2 py-1">
                                                Web Development
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Jenis Buku</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-8 col-7">
                                            <div class="px-2 py-1">
                                                Koleksi Referensi - Tugas Akhir (Skripsi)
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Lokasi</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7">
                                            <div class="px-2 py-1">
                                                KTT 01.14
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Deskripsi Fisik</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7 align-top">
                                            <div class="px-2 py-1">
                                                432
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Jumlah Buku</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-7 col-7">
                                            <div class="px-2 py-1">
                                                2 Buku
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="p-2">
                                <span class="badge bg-info"><span class="tf-icons bx bxs-book"></span>&nbsp; &nbsp; Abstrak / Ringkasan Buku</span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="col-md-12 col-12">
                                            <div class="px-2 pt-1">
                                                <div class="overflow-auto" style="height: 255px" id="vertical-example">
                                                    <p>Indonesia dikenal sebagai negara agraris yang artinya sebagian besar penduduknya bekerja pada bidang pertanian. Indonesia memiliki lahan pertanian yang luas serta sumber daya alam yang melimpah dan beraneka ragam yang dapat dimanfaatkan oleh penduduk Indonesia salah satunya dengan bercocok tanam. Namun, lahan pertanian semakin berkurang akibat peningkatan penduduk sehingga lahan pertanian dialih fungsikan menjadi bangunan untuk tempat tinggal terutama daerah perkotaan. Selain itu, kebutuhan pangan juga meningkat seiring dengan peningkatan jumlah penduduk terutama untuk sayuran dan buah. Dengan adanya permasalahan tersebut dibutuhkan suatu sistem yang mampu membantu memenuhi kebutuhan pangan dengan lahan yang terbatas dan juga efisien waktu.</p>

                                                    <p>Pada Proyek Akhir ini dilakukan perancangan sistem <em>smart indoor farming</em> yang berfokus pada aplikasi android dengan tujuan untuk <em>monitoring</em> dan <em>controlling</em> sistem <em>smart indoor farming</em>. Tujuan pembuatan aplikasi ini adalah untuk memudahkan pengguna melaksanakan <em>monitoring</em> dan <em>controlling</em> serta meningkatkan efisiensi waktu dalam kegiatan bercocok tanam. Aplikasi android smart indoor farming ini bernama HydraC.</p>

                                                    <p>Hasil keluaran dari aplikasi HydraC ini adalah pengguna dapat melakukan <em>monitoring</em> secara <em>mobile</em>. Nilai parameter yang ditampilkan pada aplikasi diambil dari Firebase yang telah menyimpan data dari perangkat <em>smart indoor farming</em>. Selain itu, pengguna juga dapat mengontrol <em>water pump</em> pada aplikasi tersebut. Hasil pengujian fungsionalitas aplikasi menunjukkan bahwa seluruh fungsi aplikasi sudah berjalan dengan baik. Uji kompatibilitas aplikasi android berjalan dengan baik dari versi 5.1 s.d. 11. Hasil pengujian kualitatif menggunakan kuesioner dan Skala Likert dengan nilai kepuasan 95.22%. </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-2">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="p-2">
                                <span class="badge bg-danger"><span class="tf-icons bx bxs-user"></span>&nbsp; &nbsp; Pengarang</span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="overflow-auto" style="height: 150px" id="vertical-example">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Nama</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    Pratama Ramadhani Wijaya
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Penyunting</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    Rokhmatul Insani S.T M.T
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Penerjemah</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    Purnama Anaking S.Kom M.Kom
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="p-2">
                                <span class="badge bg-warning"><span class="tf-icons bx bxs-buildings"></span>&nbsp; &nbsp; Penerbit</span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="overflow-auto" style="height: 150px" id="vertical-example">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Nama</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    ITTelkom Surabaya
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Kota</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    Surabaya
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Tahun</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    2022
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-2">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="p-2">
                                <span class="badge bg-dark"><span class="tf-icons bx bxs-bookmark"></span>&nbsp; &nbsp; Sirkulasi</span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="overflow-auto" style="height: 150px" id="vertical-example">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Nama</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    Non-Sirkulasi
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Harga Sewa</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    Rp. 0,00
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Denda Harian</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-7 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    Rp. 0,00
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-2">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="p-2">
                                <span class="badge bg-dark"><span class="tf-icons bx bxs-file"></span>&nbsp; &nbsp; Flipbook</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
