@extends('layout.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">User/ Jenis Keanggotaan/</span> {{ $jenisanggota->nama }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-gray"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Detail Jenis Keanggotaan</span>
                        </div>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Nama Jenis Keanggotaan</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            {{ $jenisanggota->nama }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Batas Peminjaman</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            {{ $jenisanggota->batas_booking }} Hari
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Jumlah Peminjaman Buku</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            {{ $jenisanggota->jumlah_pinjam }} Buku
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Status User</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            @if ($jenisanggota->role_user == 0)
                                                Non Mahasiswa
                                            @else
                                                Mahasiswa
                                            @endif
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
        <div class="col-md-12 col-lg-6 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-primary"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Hak Istimewa (Privileged)</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled @if ($jenisanggota->role_download == 1) checked @endif/>
                            <label class="form-check-label" for="disabledCheck2"> Download File </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled @if ($jenisanggota->role_baca == 1) checked @endif/>
                            <label class="form-check-label" for="disabledCheck2"> Membaca File </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled @if ($jenisanggota->role_booking == 1) checked @endif/>
                            <label class="form-check-label" for="disabledCheck2"> Meminjam Buku </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled @if ($jenisanggota->role_institusi == 1) checked @endif/>
                            <label class="form-check-label" for="disabledCheck2"> Memilih Institusi </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled @if ($jenisanggota->role_add_institusi == 1) checked @endif/>
                            <label class="form-check-label" for="disabledCheck2"> Menambah Institusi </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-dark"><span><iconify-icon icon="bxs:id-card" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Dokumen Persyaratan</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled @if ($jenisanggota->role_ktp == 1) checked @endif/>
                            <label class="form-check-label" for="disabledCheck2"> KTP </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled @if ($jenisanggota->role_karpeg_ktm == 1) checked @endif/>
                            <label class="form-check-label" for="disabledCheck2"> Kartu Pegawai/KTM </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled @if ($jenisanggota->role_ijazah == 1) checked @endif/>
                            <label class="form-check-label" for="disabledCheck2"> Ijazah </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 d-grid gap-2 mx-auto mb-2">
            <a class="btn btn-danger col-sm-12 d-grid gap-2 mx-auto btn-accept" type="button" href="{{ route('jenis-keanggotaan.index') }}" >Kembali</a>
        </div>
    </div>
</div>

@endsection
