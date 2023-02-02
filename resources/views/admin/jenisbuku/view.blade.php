@extends('layout.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <div class="card">
                <div class="card-body mt-3 mx-2">
                    <h4 class="card-title fw-bolder text-capitalize">
                        {{ $jenisbuku->kode_jenis_buku }} - {{ $jenisbuku->nama }}
                    </h4>
                    <p class="card-text">
                        <div class="row media">
                            <div class="col-12">
                                <span><iconify-icon icon="bx:book" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                {{ $jenisbuku->koleksi_buku->nama }}
                            </div>
                        </div>
                    </p>
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
                            <span class="badge bg-primary"><span><iconify-icon icon="bxs:book" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Identitas Buku</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Kode Buku </label>
                        </div>
                        @foreach ($jenisbuku->file_place as $filejenisbuku)
                            @if(($filejenisbuku->nama == 'ISBN') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> ISBN </label>
                                </div>
                            @endif
                            @if(($filejenisbuku->nama == 'Lokasi Buku') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Lokasi Buku </label>
                                </div>
                            @endif
                        @endforeach
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Judul Buku </label>
                        </div>
                        @foreach ($jenisbuku->file_place as $filejenisbuku)
                            @if(($filejenisbuku->nama == 'Judul Buku Inggris') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Judul Buku (Bahasa Inggris) </label>
                                </div>
                            @endif
                            @if(($filejenisbuku->nama == 'Edisi') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Edisi </label>
                                </div>
                            @endif
                        @endforeach
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Jenis Pengadaan </label>
                        </div>
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Status Pengadaan </label>
                        </div>
                        @foreach ($jenisbuku->file_place as $filejenisbuku)
                            @if(($filejenisbuku->nama == 'Program Studi') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Program Studi </label>
                                </div>
                            @endif
                            @if(($filejenisbuku->nama == 'Ilustrasi') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Ilustrasi </label>
                                </div>
                            @endif
                            @if(($filejenisbuku->nama == 'Dimensi Buku') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Dimensi Buku </label>
                                </div>
                            @endif
                        @endforeach
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Jumlah Eksemplar </label>
                        </div>
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Kota Terbit </label>
                        </div>
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Tahun Terbit </label>
                        </div>
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Pengarang </label>
                        </div>
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Subjek </label>
                        </div>
                        @foreach ($jenisbuku->file_place as $filejenisbuku)
                            @if(($filejenisbuku->nama == 'Penyunting') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Penyunting </label>
                                </div>
                            @endif
                            @if(($filejenisbuku->nama == 'Penerjemah') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Penerjemah </label>
                                </div>
                            @endif
                            @if(($filejenisbuku->nama == 'Pembimbing') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Pembimbing </label>
                                </div>
                            @endif
                            @if(($filejenisbuku->nama == 'Penerbit') && ($filejenisbuku->tipe == 'text'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> Penerbit </label>
                                </div>
                            @endif
                        @endforeach
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Cover Buku (Img) </label>
                        </div>
                        @foreach ($jenisbuku->file_place as $filejenisbuku)
                            @if(($filejenisbuku->nama == 'File') && ($filejenisbuku->tipe == 'fullfile'))
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> File PDF / E-Book </label>
                                </div>
                            @endif
                        @endforeach
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Sirkulasi </label>
                        </div>
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Status Buku </label>
                        </div>
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Role Download </label>
                        </div>
                        <div class="form-check mt-2 mx-2">
                            <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                            <label class="form-check-label" for="disabledCheck2"> Ringkasan Buku / Abstrak </label>
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
                            <span class="badge bg-dark"><span><iconify-icon icon="bxs:book" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; File Persyaratan</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        @foreach ($jenisbuku->file_place as $filejenisbuku)
                            @if($filejenisbuku->tipe == 'pdf')
                                <div class="form-check mt-2 mx-2">
                                    <input class="form-check-input" type="checkbox" id="disabledCheck2" disabled checked/>
                                    <label class="form-check-label" for="disabledCheck2"> {{ $filejenisbuku->nama }} </label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
