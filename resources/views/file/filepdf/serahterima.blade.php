{{-- Dokumen Bebas Peminjaman --}}
@if(Auth::user() -> level == 'admin')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bukti Acara Serah Terima Buku</title>
        <style>
            .table-hasil{
                border: 1px solid #000000;
            }
            .table-detail{
                border-bottom: 1px solid #000000;
            }
            .p-content{
                margin-top: 5px;
                margin-bottom: 5px;
            }
            .footer{
                font-size: 14px;
                font-weight: 600;
                padding-left: 50px;
                font-family:"Calibri, sans-serif";
                margin-top: 5px;
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <p style="display: block; margin-top: -10px; float:right">
            <img src="{{ $logo }}" style="width: 154px; height: 83px;"/>
        </p>
        <div style="margin-top: 112px; text-align: center; margin-bottom: 20px;">
            <h3>
                <strong>SURAT KETERANGAN</strong>
            </h3>
            <h3 style="margin-top: -10px; text-transform: uppercase !important;">
                <strong>BEBAS PEMINJAMAN BUKU PERPUSTAKAAN</strong>
            </h3>
        </div>
        <div style="margin-left: 30px; margin-right: 30px; margin-top: 35px;">
            <p style="margin-bottom: 10px;">Yang bertanda tangan dibawah ini :</p>
            @if(Auth::user() -> level == 'admin')
                <table style="border-collapse: collapse; width: 100%;">
                    <tr>
                        <td style="width:23%;"><p class="p-content">Nama</p></td>
                        <td style="width:4%;"><p class="p-content">:</p></td>
                        <td style="width:73%;"><p class="p-content">{{ Auth::user() -> admin -> nama_lengkap }}</p></td>
                    </tr>
                    <tr>
                        <td style="width:23%;"><p class="p-content">Jabatan</p></td>
                        <td style="width:4%;"><p class="p-content">:</p></td>
                        <td style="width:73%;"><p class="p-content">Pustakawan</p></td>
                    </tr>
                </table>
            @elseif(Auth::user() -> level == 'anggota')
            <table style="border-collapse: collapse; width: 100%;">
                <tr>
                    <td style="width:23%;"><p class="p-content">Nama</p></td>
                    <td style="width:4%;"><p class="p-content">:</p></td>
                    <td class="table-detail" style="width:73%;"><p class="p-content"></p></td>
                </tr>
                <tr>
                    <td style="width:23%;"><p class="p-content">Jabatan</p></td>
                    <td style="width:4%;"><p class="p-content">:</p></td>
                    <td style="width:73%;"><p class="p-content">Pustakawan</p></td>
                </tr>
            </table>
            @endif
            <p style="margin-top: 10px;">Menyatakan bahwa mahasiswa : </p>
        </div>
        <div style="margin-left: 30px; margin-right: 30px; margin-top: 10px;">
            <table style="border-collapse: collapse; width: 100%;">
                <tr>
                    <td style="width:23%;"><p class="p-content">Nama Lengkap</p></td>
                    <td style="width:4%;"><p class="p-content">:</p></td>
                    <td class="table-detail" style="width:73%;"><p class="p-content">{{ $donasi->anggota->nama_lengkap }}</p></td>
                </tr>
                <tr>
                    <td style="width:23%;"><p class="p-content">NIM</p></td>
                    <td style="width:4%;"><p class="p-content">:</p></td>
                    <td class="table-detail" style="width:73%;"><p class="p-content"></p></td>
                </tr>
                @if($donasi->anggota->jenis_keanggotaan->role_user == 1)
                    <tr>
                        <td style="width:23%;"><p class="p-content">Fakultas</p></td>
                        <td style="width:4%;"><p class="p-content">:</p></td>
                        <td class="table-detail" style="width:73%;"><p class="p-content">{{ $donasi->prodi->fakultas->nama }}</p></td>
                    </tr>
                    <tr>
                        <td style="width:23%;"><p class="p-content">Prodi</p></td>
                        <td style="width:4%;"><p class="p-content">:</p></td>
                        <td class="table-detail" style="width:73%;"><p class="p-content">{{ $donasi->prodi->nama }}</p></td>
                    </tr>
                @endif
            </table>
            @if($statuspeminjaman->count('pivot.status') >= 1)
                <div style="text-align: justify;">
                    <p>Masih memiliki tanggungan pinjaman buku sebanyak {{ $statuspeminjaman->count('pivot.status') }} buku</p>
                </div>
            @else
                <div style="text-align: justify;">
                    <p>Untuk saat ini tidak mempunyai tanggungan pinjaman buku maupun administrasi di Perpustakaan IT Telkom Surabaya.</p>
                </div>
                <div style="margin-top: 10px; text-align: justify;">
                    <p>Demikian surat keterangan ini dibuat dengan sebenar-benarnya untuk dipergunakan sebagaimana mestinya.</p>
                </div>
            @endif
        </div>
        <div style="margin-left: 30px; margin-right: 30px; margin-top: 40px;">
            <table style="border-collapse: collapse; width: 100%;">
                <tr>
                    <td style="width:42%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:42%; text-align: center;"><p class="p-content">Surabaya, {{ $tanggallengkap }}</p></td>
                </tr>
                <tr>
                    <td style="width:42%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:42%; text-align: center;"><p class="p-content">Pustakawan,</p></td>
                </tr>
                <tr>
                    <td style="width:42%; height: 80px; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:16%; height: 80px; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:42%; height: 80px; text-align: center;"><p class="p-content"></p></td>
                </tr>
                <tr>
                    <td style="width:42%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:42%; text-align: center;"><p class="p-content">( {{ Auth::user() -> admin -> nama_lengkap }} )</p></td>
                </tr>
            </table>
        </div>
        <div style="position: absolute; bottom: -50px; left: -50px;">
            <p style="color: red;" class="footer">INSTITUT TEKNOLOGI TELKOM SURABAYA</p>
            <p style="color: black;" class="footer">Jl. Ketintang No.156</p>
            <p style="color: black;" class="footer">Kec. Gayungan, Kota Surabaya, Jawa Timur 60231</p>
            <p style="color: black;" class="footer">Telp : (031) 828000</p>
            <p style="color: black;" class="footer">www.ittelkom-sby.ac.id</p>
            <img src="{{ $footer }}" style="width: 120%; height: 30px;"/>
        </div>
    </body>
    </html>
@endif


{{-- Dokumen Syarat Yudisium --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Acara Serah Terima Buku</title>
    <style>
        .table-hasil{
            border: 1px solid #000000;
        }
        .table-detail{
            border-bottom: 1px solid #000000;
        }
        .p-content{
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .footer{
            font-size: 14px;
            font-weight: 600;
            padding-left: 50px;
            font-family:"Calibri, sans-serif";
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <p style="display: block; margin-top: -10px; float:right">
        <img src="{{ $logo }}" style="width: 154px; height: 83px;"/>
    </p>
    <div style="margin-top: 112px; text-align: center; margin-bottom: 20px;">
        <h3>
            <strong>BERITA ACARA</strong>
        </h3>
        <h3 style="margin-top: -10px; text-transform: uppercase !important;">
            <strong>SERAH TERIMA {{ $donasi->jenis_buku->nama }}</strong>
        </h3>
    </div>
    <div style="margin-left: 30px; margin-right: 30px; margin-top: 35px;">
        <table style="border-collapse: collapse; width: 100%;">
            <tr style="vertical-align: top !important;">
                <td style="font-weight: normal; text-align: left; width:40%; height: 10px;"><p class="p-content">Pada hari ini : </p></td>
                <td style="width:40%;"><p style="text-transform: capitalize !important;" class="p-content">Tanggal : </p></td>
                <td style="font-weight: normal; width:20%; height: 20px; text-align: right;"><p class="p-content">Tahun : {{ $tahun }}</p></td>
            </tr>
        </table>
        <p style="margin-top: 10px;">Saya yang bertanda tangan dibawah ini:</p>
    </div>
    <div style="margin-left: 30px; margin-right: 30px; margin-top: 10px;">
        <table style="border-collapse: collapse; width: 100%;">
            <tr>
                <td style="width:23%;"><p class="p-content">Nama Lengkap</p></td>
                <td style="width:4%;"><p class="p-content">:</p></td>
                <td class="table-detail" style="width:73%;"><p class="p-content">{{ $donasi->anggota->nama_lengkap }}</p></td>
            </tr>
            <tr>
                <td style="width:23%;"><p class="p-content">NIM</p></td>
                <td style="width:4%;"><p class="p-content">:</p></td>
                <td class="table-detail" style="width:73%;"><p class="p-content"></p></td>
            </tr>
            @if($donasi->anggota->jenis_keanggotaan->role_user == 1)
                <tr>
                    <td style="width:23%;"><p class="p-content">Fakultas</p></td>
                    <td style="width:4%;"><p class="p-content">:</p></td>
                    <td class="table-detail" style="width:73%;"><p class="p-content">{{ $donasi->prodi->fakultas->nama }}</p></td>
                </tr>
                <tr>
                    <td style="width:23%;"><p class="p-content">Prodi</p></td>
                    <td style="width:4%;"><p class="p-content">:</p></td>
                    <td class="table-detail" style="width:73%;"><p class="p-content">{{ $donasi->prodi->nama }}</p></td>
                </tr>
            @endif
        </table>
        <div>
            <p>Menyerahkan :</p>
        </div>
        <div style="margin-top: 10px; text-align: justify;">
            <p>{{ $donasi->jml_eksemplar }} Eksemplar {{ $donasi->jenis_buku->nama }} YANG TELAH DIPERBAIKI, TELAH DISETUJUI, DITANDATANGANI OLEH SEMUA PEMBIMBING DAN TELAH DISAHKAN, JUGA TELAH DIJILID LENGKAP DENGAN JUDUL :</p>
        </div>
        <div style="margin-top: 10px; text-transform: uppercase !important; text-align: justify;">
            <p>{{ $donasi->judul }}</p>
        </div>
        <div style="margin-top: 10px;">
            <p>Demikian, untuk menjadi syarat kelengkapan yudisium.</p>
        </div>
    </div>
    <div style="margin-left: 30px; margin-right: 30px; margin-top: 40px;">
        <table style="border-collapse: collapse; width: 100%;">
            <tr>
                <td style="width:42%; text-align: center;"><p class="p-content">Yang Menerima,</p></td>
                <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                <td style="width:42%; text-align: center;"><p class="p-content">Yang Menyerahkan,</p></td>
            </tr>
            <tr>
                <td style="width:42%; text-align: center;"><p class="p-content">Pustakawan</p></td>
                <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                <td style="width:42%; text-align: center;"><p class="p-content">Mahasiswa</p></td>
            </tr>
            <tr>
                <td style="width:42%; height: 80px; text-align: center;"><p class="p-content"></p></td>
                <td style="width:16%; height: 80px; text-align: center;"><p class="p-content"></p></td>
                <td style="width:42%; height: 80px; text-align: center;"><p class="p-content"></p></td>
            </tr>
            @if (Auth::user() -> level == 'admin')
                <tr>
                    <td style="width:42%; text-align: center;"><p class="p-content">{{ Auth::user() -> admin -> nama_lengkap }}</p></td>
                    <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:42%; text-align: center;"><p class="p-content">{{ $donasi->anggota->nama_lengkap }}</p></td>
                </tr>
            @elseif(Auth::user() -> level == 'anggota')
                <tr>
                    <td style="width:42%; text-align: center;"><p class="p-content">(………………………………………)</p></td>
                    <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:42%; text-align: center;"><p class="p-content">( {{ Auth::user() -> anggota -> nama_lengkap }} )</p></td>
                </tr>
            @endif
        </table>
    </div>
    <div style="position: absolute; bottom: -50px; left: -50px;">
        <p style="color: red;" class="footer">INSTITUT TEKNOLOGI TELKOM SURABAYA</p>
        <p style="color: black;" class="footer">Jl. Ketintang No.156</p>
        <p style="color: black;" class="footer">Kec. Gayungan, Kota Surabaya, Jawa Timur 60231</p>
        <p style="color: black;" class="footer">Telp : (031) 828000</p>
        <p style="color: black;" class="footer">www.ittelkom-sby.ac.id</p>
        <img src="{{ $footer }}" style="width: 120%; height: 30px;"/>
    </div>
</body>
</html>

{{-- Dokumen List Persyaratan --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Acara Serah Terima Buku</title>
    <style>
        .table-hasil{
            border: 1px solid #000000;
        }
        .p-content{
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .footer{
            font-size: 14px;
            font-weight: 600;
            padding-left: 50px;
            font-family:"Calibri, sans-serif";
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <p style="display: block; margin-top: -10px; float:right">
        <img src="{{ $logo }}" style="width: 154px; height: 83px;"/>
    </p>
    <div style="margin-top: 112px; text-align: center; margin-bottom: 20px;">
        <h3>
            <strong>BERITA ACARA</strong>
        </h3>
        <h3 style="margin-top: -10px; text-transform: uppercase !important;">
            <strong>SERAH TERIMA {{ $donasi->jenis_buku->nama }}</strong>
        </h3>
    </div>
    <div style="margin-left: 30px; margin-right: 30px; margin-top: 35px;">
        <table style="border-collapse: collapse; width: 100%;">
            <tr style="vertical-align: top !important;">
                <td style="font-weight: normal; text-align: left; width:23%; height: 10px;"><p class="p-content">Nama Lengkap</p></td>
                <td style="font-weight: normal; width:4%; height: 20px;"><p class="p-content">:</p></td>
                <td style="width:73%;"><p style="text-transform: capitalize !important;" class="p-content">{{ $donasi->anggota->nama_lengkap }}</p></td>
            </tr>
            <tr style="vertical-align: top !important;">
                <td style="font-weight: normal; text-align: left; width:23%; height: 10px;"><p class="p-content">NIM</p></td>
                <td style="font-weight: normal; width:4%; height: 20px;"><p class="p-content">:</p></td>
                <td style="width:73%;"><p style="text-transform: capitalize !important;" class="p-content"></p></td>
            </tr>
            <tr style="vertical-align: top !important;">
                <td style="font-weight: normal; text-align: left; width:23%; height: 10px;"><p class="p-content">Judul Buku</p></td>
                <td style="font-weight: normal; width:4%; height: 20px;"><p class="p-content">:</p></td>
                <td style="width:73%;"><p style="text-transform: capitalize !important;" class="p-content">{{ $donasi->judul }}</p></td>
            </tr>
        </table>
    </div>
    <div style="margin-left: 30px; margin-right: 30px; margin-top: 40px;">
        <table style="border-collapse: collapse; width: 100%;">
            <tr>
                <th class="table-hasil" style="width:10%; background-color: #f2f2f2;"><p class="p-content">No.</p></th>
                <th class="table-hasil" style="width:75%; background-color: #f2f2f2;"><p class="p-content">Hasil</p></th>
                <th class="table-hasil" style="width:15%; background-color: #f2f2f2;"><p class="p-content">ADA*)</p></th>
            </tr>
            <tr>
                <td class="table-hasil" style="width:10%; text-align: center;"><p class="p-content">1.</p></th>
                <td class="table-hasil" style="width:75%; text-align: left;"><p class="p-content" style="margin-left: 10px; margin-right: 10px;">Buku yang akan didonasikan dalam bentuk hard copy / buku fisik</p></th>
                @if($donasi->status_donasi == 'selesai')
                    <td class="table-hasil p-content" style="width:15%; text-align: center;">
                        <p class="p-content"><img src="https://img.icons8.com/ios-filled/512/checkmark.png" style="width: 15px; height: 15px"/></p>
                    </th>
                @else
                    <td class="table-hasil" style="width:15%;"><p class="p-content"></p></th>
                @endif
            </tr>
            @foreach ($donasi->file as $index => $filedonasi)
                @if ($filedonasi->file_place->type == 'fullfile')
                    <tr>
                        <td class="table-hasil" style="width:10%; text-align: center;"><p class="p-content">{{ $index +2 }}.</p></th>
                        <td class="table-hasil" style="width:75%; text-align: left;"><p class="p-content" style="margin-left: 10px; margin-right: 10px;">Buku yang akan didonasikan telah diupload ke repository dengan bentuk softfile</p></th>
                        @if(($donasi->status_donasi == 'diterima') || ($donasi->status_donasi == 'selesai'))
                            <td class="table-hasil p-content" style="width:15%; text-align: center;">
                                <p class="p-content"><img src="https://img.icons8.com/ios-filled/512/checkmark.png" style="width: 15px; height: 15px"/></p>
                            </th>
                        @else
                            <td class="table-hasil" style="width:15%;"><p class="p-content"></p></th>
                        @endif
                    </tr>
                @else
                    <tr>
                        <td class="table-hasil" style="width:10%; text-align: center;"><p class="p-content">{{ $index +2 }}.</p></th>
                        <td class="table-hasil" style="width:75%; text-align: left;"><p class="p-content" style="margin-left: 10px; margin-right: 10px;">{{ $filedonasi->file_place->name }}</p></th>
                        @if(($donasi->status_donasi == 'diterima') || ($donasi->status_donasi == 'selesai'))
                            <td class="table-hasil p-content" style="width:15%; text-align: center;">
                                <p class="p-content"><img src="https://img.icons8.com/ios-filled/512/checkmark.png" style="width: 15px; height: 15px"/></p>
                            </th>
                        @else
                            <td class="table-hasil" style="width:15%;"><p class="p-content"></p></th>
                        @endif
                    </tr>
                @endif
            @endforeach
        </table>
        <div style="margin-top: 5px;">
            <p><strong>*) Beri tanda </strong><img src="https://img.icons8.com/ios-filled/512/checkmark.png" style="width: 15px; height: 15px"/><strong> jika hasil yang dimaksud sudah ada.</strong></p>
        </div>
    </div>
    <div style="margin-left: 30px; margin-right: 30px; margin-top: 50px;">
        <table style="border-collapse: collapse; width: 100%;">
            <tr>
                <td style="width:42%; text-align: center;"><p class="p-content"></p></td>
                <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                <td style="width:42%; text-align: center;"><p class="p-content">Surabaya, {{ $tanggallengkap }}</p></td>
            </tr>
            <tr>
                <td style="width:42%; text-align: center;"><p class="p-content">Mahasiswa</p></td>
                <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                <td style="width:42%; text-align: center;"><p class="p-content">Staff BPA</p></td>
            </tr>
            <tr>
                <td style="width:42%; height: 80px; text-align: center;"><p class="p-content"></p></td>
                <td style="width:16%; height: 80px; text-align: center;"><p class="p-content"></p></td>
                <td style="width:42%; height: 80px; text-align: center;"><p class="p-content"></p></td>
            </tr>
            @if (Auth::user() -> level == 'admin')
                <tr>
                    <td style="width:42%; text-align: center;"><p class="p-content">( {{ $donasi->anggota->nama_lengkap }} )</p></td>
                    <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:42%; text-align: center;"><p class="p-content">( {{ Auth::user() -> admin -> nama_lengkap }} )</p></td>
                </tr>
            @elseif(Auth::user() -> level == 'anggota')
                <tr>
                    <td style="width:42%; text-align: center;"><p class="p-content">( {{ Auth::user() -> anggota -> nama_lengkap }} )</p></td>
                    <td style="width:16%; text-align: center;"><p class="p-content"></p></td>
                    <td style="width:42%; text-align: center;"><p class="p-content">(………………………………………)</p></td>
                </tr>
            @endif
        </table>
    </div>
    <div style="position: absolute; bottom: -50px; left: -50px;">
        <p style="color: red;" class="footer">INSTITUT TEKNOLOGI TELKOM SURABAYA</p>
        <p style="color: black;" class="footer">Jl. Ketintang No.156</p>
        <p style="color: black;" class="footer">Kec. Gayungan, Kota Surabaya, Jawa Timur 60231</p>
        <p style="color: black;" class="footer">Telp : (031) 828000</p>
        <p style="color: black;" class="footer">www.ittelkom-sby.ac.id</p>
        <img src="{{ $footer }}" style="width: 120%; height: 30px;"/>
    </div>
</body>
</html>


