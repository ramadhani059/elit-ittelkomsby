@extends('layout.admin')

@section('search-navbar')

<div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Search..."
        aria-label="Search..."
      />
    </div>
</div>

@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row align-items-center d-flex media py-4">
        <div class="col-lg-6 col-12 media-body d-none d-lg-block f-grow-1">
            <h5 class="fw-bold"><span class="text-muted fw-light">User/</span> List User</h5>
        </div>
        <div class="col-lg-6 col-12 text-end">
            <a class="btn btn-sm btn-primary" data-toggle="tooltip" href="{{ route('user-admin.create' )}}" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="tf-icons bx bx-plus"></span>&nbsp; Add
            </a>
            <a class="btn btn-sm btn-dark" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="tf-icons bx bx-import"></span>&nbsp; Import
            </a>
            <a class="btn btn-sm btn-danger" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="tf-icons bx bx-export"></span>&nbsp; Export
            </a>
        </div>
    </div>

    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover mt-3 mb-3">
            <thead>
              <tr class="text-nowrap">
                <th><strong>No.</strong></th>
                <th><strong>Nama Lengkap </strong></th>
                <th><strong>Jenis Anggota</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Dokumen</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($user as $user)
              <tr class="text-nowrap">
                <td><strong>{{ $loop->iteration }}</strong></td>
                <td>
                    <div class="media align-items-center d-flex ">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/avatars/user.jpg') }}" alt class="w-px-40 h-px-40 rounded-circle" />
                        </div>
                        <div class="media-body d-none d-lg-block f-grow-1">
                            <span class="fw-semibold d-block">
                                @if ($user->level == 'anggota')
                                    <?php echo \Illuminate\Support\Str::limit(strip_tags($user->anggota->nama_lengkap), 20, $end='...') ?>
                                @else
                                    <?php echo \Illuminate\Support\Str::limit(strip_tags($user->admin->nama_lengkap), 20, $end='...') ?>
                                @endif
                            </span>
                        </div>
                    </div>
                </td>
                <td>
                    @if ($user->level == 'anggota')
                        {{ $user->anggota->jenis_keanggotaan->nama }}
                    @else
                        Admin
                    @endif
                </td>
                <td>
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($user->email), 15, $end='...') ?>
                </td>
                <td>
                    @if ($user->level == 'anggota')
                        {{ $user->anggota->verifikasi }}
                    @else
                        Terverifikasi
                    @endif
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="{{ route('user-admin.show', ['user_admin' => $user->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="tf-icons bx bx-show"></span>
                        </a>
                        @if (($user->level == 'anggota'))
                            @if ($user->anggota->verifikasi == 'Belum Terverifikasi')
                                <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('user-admin.edit', ['user_admin' => $user->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="tf-icons bx bx-check"></span>
                                </a>
                            @else
                                <a class="btn btn-icon btn-sm btn-secondary me-2" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="tf-icons bx bx-check"></span>
                                </a>
                            @endif
                        @else
                            <a class="btn btn-icon btn-sm btn-secondary me-2" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="tf-icons bx bx-check"></span>
                            </a>
                        @endif

                        <form action="{{ route('user-admin.destroy', ['user_admin' => $user->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger" data-name="{{ $user->nama }}" ><span class="tf-icons bx bx-trash"></span></button>
                        </form>
                    </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
    </div>
    <!--/ Hoverable Table rows -->
</div>

@endsection
