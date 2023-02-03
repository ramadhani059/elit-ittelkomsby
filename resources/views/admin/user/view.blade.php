@extends('layout.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <div class="card">
                <div class="card-body mt-3 mx-2">
                    <h4 class="card-title fw-bolder text-capitalize">
                        @if($user->level == 'anggota')
                            {{ $user->anggota->nama_lengkap }}
                            @if($user->anggota->verifikasi == 'Terverifikasi')
                                <span><iconify-icon icon="bxs:check-shield" class="tf-icons bx text-primary mx-2" style="font-size: 30px"></iconify-icon></span>
                            @endif
                        @else
                            {{ $user->admin->nama_lengkap }}

                            <span><iconify-icon icon="bxs:check-shield" class="tf-icons bx text-primary mx-2" style="font-size: 30px"></iconify-icon></span>
                        @endif
                    </h4>
                    <p class="card-text">
                        <div class="row media">
                            <div class="col-12 text-capitalize">
                                <span><iconify-icon icon="bx:user" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                    {{ $user->level }}
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
                  src="@if ($user->profile_photo_path != null)
                        {{ asset('storage/user/photo/'.$user->profile_photo_path) }}
                    @else
                        {{ asset('assets/img/avatars/user.jpg') }}
                    @endif"
                  alt="Card image cap"
                />
              </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-9 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-primary"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Identitas User</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Nama Lengkap</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            @if($user->level == 'anggota')
                                                {{ $user->anggota->nama_lengkap }}
                                            @else
                                                {{ $user->admin->nama_lengkap }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Jenis Keanggotaan</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            @if($user->level == 'anggota')
                                                {{ $user->anggota->jenis_keanggotaan->nama }}
                                            @else
                                                Admin
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Status Keanggotaan</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            @if($user->status == 'Active')
                                                <span class="badge bg-primary me-2">{{ $user->status }}</span>
                                            @else
                                                <span class="badge bg-danger me-2">{{ $user->status }}</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @if($user->level == 'anggota')
                                    <tr>
                                        <td class="col-md-3 col-4 align-top">
                                            <div class="px-2 py-1">
                                                <strong>Institusi</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-1 col-1 align-top">
                                            <div class="px-2 py-1">
                                                <strong>:</strong>
                                            </div>
                                        </td>
                                        <td class="col-md-8 col-7 align-top">
                                            <div class="px-2 py-1">
                                                {{ $user->anggota->institusi->nama }}
                                            </div>
                                        </td>
                                    </tr>
                                    @if($user->anggota->fakultas != null)
                                        <tr>
                                            <td class="col-md-3 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Fakultas</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-8 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    @if($user->anggota->fakultas == 'FTIB')
                                                        Fakultas Teknologi Informasi dan Bisnis
                                                    @else
                                                        Fakultas Teknologi Elektro dan Industri Cerdas
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3 col-4 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>Program Studi</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-1 col-1 align-top">
                                                <div class="px-2 py-1">
                                                    <strong>:</strong>
                                                </div>
                                            </td>
                                            <td class="col-md-8 col-7 align-top">
                                                <div class="px-2 py-1">
                                                    {{ $user->anggota->prodi }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Alamat Rumah</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            @if($user->level == 'anggota')
                                                {{ $user->anggota->alamat }}
                                            @else
                                                {{ $user->admin->alamat }}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="p-2">
                            <span class="badge bg-dark"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Data Akun Sosial</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Email Aktif</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            {{ $user->email }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 col-4 align-top">
                                        <div class="px-2 py-1">
                                            <strong>Nomor Handphone</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-1 col-1 align-top">
                                        <div class="px-2 py-1">
                                            <strong>:</strong>
                                        </div>
                                    </td>
                                    <td class="col-md-8 col-7 align-top">
                                        <div class="px-2 py-1">
                                            @if($user->level == 'anggota')
                                                {{ $user->anggota->no_hp }}
                                            @else
                                                {{ $user->admin->no_hp }}
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
    @if ($user->level == 'anggota')
        @if ($user->anggota->jenis_keanggotaan->role_ktp == 1)
            @if($user->anggota->ijazah_encrypt != null)
                <div class="row">
                    <div class="col-md-12 col-lg-12 mb-2">
                        <div class="card  p-2">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="pb-2">
                                        <span class="badge bg-info"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Ijazah</span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div>
                                        <iframe src="{{ route('ijazahpdf', ['id' => $user->anggota->id,'originalname' => $user->anggota->ijazah_original]) }}" frameborder="0" width="100%" height="550"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12 col-lg-12 mb-2">
                        <div class="card  p-2">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="pb-2">
                                        <span class="badge bg-info"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Ijazah</span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    Tidak Ada Data Ijazah Pengguna
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @endif
    <div class="row">
            @if ($user->level == 'anggota')
                @if ($user->anggota->jenis_keanggotaan->role_ktp == 1)
                <div class="col-md-12 col-lg-6 mb-2">
                    <div class="card  p-2">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="pb-2">
                                    <span class="badge bg-danger"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; KTP</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                @if($user->anggota->ktp_encrypt != null)
                                    <img
                                        class="img-fluid d-flex mx-auto"
                                        src="{{ asset('storage/user/ktp/'.$user->anggota->ktp_encrypt) }}"
                                        alt="Card image cap"
                                    />
                                @else
                                    Tidak Ada Data KTP Pengguna
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @else
                <div class="col-md-12 col-lg-6 mb-2">
                    <div class="card  p-2">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="pb-2">
                                    <span class="badge bg-danger"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; KTP</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                @if($user->admin->ktp_encrypt != null)
                                    <img
                                        class="img-fluid d-flex mx-auto"
                                        src="{{ asset('storage/user/ktp/'.$user->admin->ktp_encrypt) }}"
                                        alt="Card image cap"
                                    />
                                @else
                                    Tidak Ada Data KTP Pengguna
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($user->level == 'anggota')
                @if ($user->anggota->jenis_keanggotaan->role_karpeg_ktm == 1)
                <div class="col-md-12 col-lg-6 mb-2">
                    <div class="card  p-2">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="pb-2">
                                    <span class="badge bg-warning"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Kartu Pegawai / KTM</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                @if($user->anggota->karpeg_ktm_encrypt != null)
                                    <img
                                        class="img-fluid d-flex mx-auto"
                                        src="{{ asset('storage/user/karpegktm/'.$user->anggota->karpeg_ktm_encrypt) }}"
                                        alt="Card image cap"
                                    />
                                @else
                                    Tidak Ada Data Kartu Pegawai / KTM Pengguna
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @else
                <div class="col-md-12 col-lg-6 mb-2">
                    <div class="card  p-2">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="pb-2">
                                    <span class="badge bg-warning"><span><iconify-icon icon="bxs:user" class="tf-icons bx"></iconify-icon></span>&nbsp; &nbsp; Kartu Pegawai / KTM</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                @if($user->admin->karpeg_ktm_encrypt != null)
                                    <img
                                        class="img-fluid d-flex mx-auto"
                                        src="{{ asset('storage/user/karpegktm/'.$user->admin->karpeg_ktm_encrypt) }}"
                                        alt="Card image cap"
                                    />
                                @else
                                    Tidak Ada Data Kartu Pegawai / KTM Pengguna
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    </div>
    <div class="row">
        <div class="col-sm-12 d-grid gap-2 mx-auto mb-2">
            <a class="btn btn-danger col-sm-12 d-grid gap-2 mx-auto btn-accept" type="button" href="{{ route('user-admin.index') }}" >Kembali</a>
        </div>
    </div>
</div>

@endsection
