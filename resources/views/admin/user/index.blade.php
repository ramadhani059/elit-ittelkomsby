@extends('layout.admin')

@section('search-navbar')

<div class="navbar-nav align-items-center">
    <form class="d-flex" action="{{ route('searchpengguna.admin') }}" method="GET" id="form">
        @csrf
        <div class="nav-item d-flex align-items-center">
            <iconify-icon icon="bx:search" class="fs-4 lh-0"></iconify-icon>
            <input
                type="text"
                name="keyword"
                value="{{ old('keyword') }}"
                class="form-control border-0 shadow-none"
                placeholder="Search..."
                aria-label="Search..."
            />
        </div>
    </form>
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
                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>&nbsp; Add
            </a>
            <a class="btn btn-sm btn-dark" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span><iconify-icon icon="bx:import" class="tf-icons bx"></iconify-icon></span>&nbsp; Import
            </a>
            <a class="btn btn-sm btn-danger" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span><iconify-icon icon="bx:export" class="tf-icons bx"></iconify-icon></span>&nbsp; Export
            </a>
        </div>
    </div>

    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-hover mt-3 mb-3 datatable">
            <thead>
              <tr class="text-nowrap">
                <th><strong>No.</strong></th>
                <th><strong>Nama Lengkap </strong></th>
                <th><strong>Jenis Anggota</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Status</strong></th>
                <th><strong>Dokumen</strong></th>
                <th></th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($user as $users)
              <tr class="text-nowrap">
                <td><strong>{{ $loop->iteration }}</strong></td>
                <td>
                    <div class="media align-items-center d-flex ">
                        <div class="avatar me-4">
                            <img src="{{ asset('assets/img/avatars/user.jpg') }}" alt class="w-px-40 h-px-40 rounded-circle" />
                        </div>
                        <div class="media-body d-none d-lg-block f-grow-1">
                            <span class="fw-semibold d-block">
                                @if ($users->level == 'anggota')
                                    {{ $users->anggota->nama_lengkap }}
                                @else
                                    {{ $users->admin->nama_lengkap }}
                                @endif
                            </span>
                        </div>
                    </div>
                </td>
                <td>
                    @if ($users->level == 'anggota')
                        {{ $users->anggota->jenis_keanggotaan->nama }}
                    @else
                        Admin
                    @endif
                </td>
                <td>
                    <?php echo \Illuminate\Support\Str::limit(strip_tags($users->email), 15, $end='...') ?>
                </td>
                <td>
                    {{ $users->status }}
                </td>
                <td>
                    @if ($users->level == 'anggota')
                        {{ $users->anggota->verifikasi }}
                    @else
                        Terverifikasi
                    @endif
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-icon btn-sm btn-primary me-2" data-toggle="tooltip" href="{{ route('user-admin.show', ['user_admin' => $users->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><iconify-icon icon="bx:show" class="tf-icons bx"></iconify-icon></span>
                        </a>
                        @if (($users->level == 'anggota'))
                            @if ($users->anggota->verifikasi == 'Belum Terverifikasi')
                                <a class="btn btn-icon btn-sm btn-dark me-2" data-toggle="tooltip" href="{{ route('user-admin.edit', ['user_admin' => $users->id]) }}" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span><iconify-icon icon="bx:check" class="tf-icons bx"></iconify-icon></span>
                                </a>
                            @else
                                <a class="btn btn-icon btn-sm btn-danger me-2 btn-block" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span><iconify-icon icon="bx:block" class="tf-icons bx"></iconify-icon></span>
                                </a>
                            @endif
                        @else
                            <a class="btn btn-icon btn-sm btn-danger me-2 btn-block" data-toggle="tooltip" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span><iconify-icon icon="bx:block" class="tf-icons bx"></iconify-icon></span>
                            </a>
                        @endif

                        <form action="{{ route('user-admin.destroy', ['user_admin' => $users->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" data-toggle="tooltip" class="btn btn-icon btn-sm btn-danger btn-delete" data-name="{{ $users->nama }}" ><span><iconify-icon icon="bx:trash" class="tf-icons bx"></iconify-icon></span></button>
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
    {{ $user->links('layout.pagination') }}
</div>

@endsection
