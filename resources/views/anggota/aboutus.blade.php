@extends('layout.anggota')

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-sm-12 col-lg-5 mb-2">
                <img
                    class="card-img"
                    src="{{ asset('assets/img/aboutus/perpustakaan-1.jpg') }}"
                    alt="About Us"
                    width="100%"
                />
            </div>
            <div class="col-md-12 col-lg-7 mb-2">
                <div class="card p-4">
                    <h3><strong>Tentang Kami</strong></h3>
                    <div style="text-align: justify;">
                        <p class="mb-3">
                            Perpustakaan ITTelkom Surabaya merupakan salah satu layanan yang disediakan oleh bidang akademik ITTelkom Surabaya sebagai penunjang utama untuk memenuhi kebutuhan informasi ilmiah bagi seluruh civitas akademika dilingkungan ITTelkom Surabaya. Layanan Perpustakaan secara struktural berada di bawah bidang Akademik dan dikelola oleh staf pusat bahasa dan perpustakaan. Kepala bagian Akademik Tahun 2019-Sekarang adalah Rokhmatul Insani, S.T., M.T.
                        </p>
                        <p><strong>Lokasi</strong></p>
                        <p>Terletak di sayap kanan lantai 1 gedung Institut Teknologi Telkom Surabaya yang beralamatkan di Jl. Ketintang No.156, Ketintang, Kec. Gayungan, Kota Surabaya, Jawa Timur</p>
                        <p><strong>Sejarah</strong></p>
                        <p>Awal mula berdirinya Perpustakaan bersamaan dengan berdirinya Institut Teknologi Telkom Surabaya yang diselenggarakan oleh Yayasan Pendidikan Telkom, sejak tanggal 04 September 2018 berdasarkan Surat Keputusan Kementrian Riset, Teknologi dan Pendidikan Tinggi Nomor 733/KPT/I/2018</p>
                        <p><strong>Tugas Pokok dan Fungsi</strong></p>
                        <p>Perpustakaan Institut Telnologi Telkom Surabaya sudah melaksanakan tugas pokok dan fungsi perpustakaan perguruan tinggi yang meliputi Tujuan, Tugas, dan Fungsi Perpustakaan Perguruan Tinggi sebagai sarana belajar seumur hidup</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
