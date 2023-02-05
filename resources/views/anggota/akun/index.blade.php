@extends('layout.anggota')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-2">
            <div class="card">
                <div class="card-body mt-3 mx-2">
                    <h4 class="card-title fw-bolder text-capitalize">
                        @if(Auth::user()->level == 'anggota')
                            {{ Auth::user()->anggota->nama_lengkap }}
                            @if(Auth::user()->anggota->verifikasi == 'Terverifikasi')
                                <span><iconify-icon icon="bxs:check-shield" class="tf-icons bx text-primary mx-2" style="font-size: 30px"></iconify-icon></span>
                            @endif
                        @else
                            {{ Auth::user()->admin->nama_lengkap }}

                            <span><iconify-icon icon="bxs:check-shield" class="tf-icons bx text-primary mx-2" style="font-size: 30px"></iconify-icon></span>
                        @endif
                    </h4>
                    <p class="card-text">
                        <div class="row media">
                            <div class="col-12 text-capitalize">
                                <span><iconify-icon icon="bx:user" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                    {{ Auth::user()->level }}
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
                  src="@if (Auth::user()->profile_photo_path != null)
                        {{ asset('storage/user/photo/'.Auth::user()->profile_photo_path) }}
                    @else
                        {{ asset('assets/img/avatars/user.jpg') }}
                    @endif"
                  alt="Card image cap"
                />
              </div>
              @if(Auth::user()->level == 'anggota')
                @if(Auth::user()->anggota->verifikasi != 'Terverifikasi')
                    <div class="d-grid gap-2 col-lg-12 px-3 mt-1 mb-1 akun">
                        <a type="submit" data-toggle="tooltip" class="btn btn-primary text-white btn-verifikasi" style="width: 100%" >Verifikasi</a>
                    </div>
                @endif
              @endif
              <div class="d-grid gap-2 col-lg-12 px-3 mt-1 mb-3">
                <a type="submit" href="{{ route('editmyanggotaprofile', ['id' => Auth::user()->id]) }}" data-toggle="tooltip" class="btn btn-danger text-white" style="width: 100%" >Edit Profile</a>
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
                                            @if(Auth::user()->level == 'anggota')
                                                {{ Auth::user()->anggota->nama_lengkap }}
                                            @else
                                                {{ Auth::user()->admin->nama_lengkap }}
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
                                            @if(Auth::user()->level == 'anggota')
                                                {{ Auth::user()->anggota->jenis_keanggotaan->nama }}
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
                                            @if(Auth::user()->status == 'Active')
                                                <span class="badge bg-primary me-2">{{ Auth::user()->status }}</span>
                                            @else
                                                <span class="badge bg-danger me-2">{{ Auth::user()->status }}</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @if(Auth::user()->level == 'anggota')
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
                                                {{ Auth::user()->anggota->institusi->nama }}
                                            </div>
                                        </td>
                                    </tr>
                                    @if(Auth::user()->anggota->fakultas != null)
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
                                                    @if(Auth::user()->anggota->fakultas == 'FTIB')
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
                                                    {{ Auth::user()->anggota->prodi }}
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
                                            @if(Auth::user()->level == 'anggota')
                                                {{ Auth::user()->anggota->alamat }}
                                            @else
                                                {{ Auth::user()->admin->alamat }}
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
                                            {{ Auth::user()->email }}
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
                                            @if(Auth::user()->level == 'anggota')
                                                {{ Auth::user()->anggota->no_hp }}
                                            @else
                                                {{ Auth::user()->admin->no_hp }}
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
    <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
          <div class="mb-3 col-12 mb-0">
            <div class="alert alert-danger">
              <h6 class="alert-heading fw-bold mb-1">Apakah anda yakin untuk menonaktifkan akun ini ?</h6>
              <p class="mb-0">Setelah anda menonaktifkan akun, anda tidak dapat masuk kedalam sistem lagi !!!</p>
            </div>
          </div>
          <form action="{{ route('nonactiveanggotaaccount', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data" id="registerForm">
            @csrf
            @method('put')
            <div class="form-check mb-3">
              <input
                class="form-check-input"
                type="checkbox"
                name="accountActivation"
                value=1
                id="accountActivation"
                required
              />
              <label class="form-check-label" for="accountActivation"
                >Saya setuju ingin menonaktifkan akun</label
              >
            </div>
            <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
          </form>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            // Warning Melampaui Batas Pinjam
            $(".akun").on("click", ".btn-verifikasi", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Coming Soon...",
                    icon: "info",
                    confirmButtonClass: "bg-danger",
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
