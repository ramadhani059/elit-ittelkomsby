@extends('layout.admin')

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profil Saya /</span> Verifikasi</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">Requirements Document</h5>
        <!-- Account -->
        <form action="{{ route('updatemyprofile', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data" id="registerForm">
        @csrf
        @method('put')
            <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                @if (Auth::user()->profile_photo_path != null)
                    <img
                        src="{{ asset('storage/user/photo/'.Auth::user()->profile_photo_path) }}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"
                    />
                @else
                    <img
                        src="{{ asset('assets/img/avatars/user.jpg') }}"
                        alt="user-avatar"
                        class="d-block rounded"
                        height="100"
                        width="100"
                        id="uploadedAvatar"
                    />
                @endif
                <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                    type="file"
                    id="upload"
                    class="account-file-input"
                    name="photo"
                    hidden
                    accept="image/png, image/jpeg"
                    />
                </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                </button>
                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                </div>
            </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nama Lengkap
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:user"></iconify-icon>
                        </span>
                        <input
                            id="fullname"
                            type="text"
                            class="form-control @error('fullname') is-invalid @enderror"
                            name="fullname"
                            placeholder="Your Full Name"
                            aria-describedby="basic-addon13"
                            value="{{ Auth::user()->admin->nama_lengkap }}"
                            autocomplete="fullname"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="fullname-errorMsg"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Nomor Handphone
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:phone"></iconify-icon>
                        </span>
                        <input
                            id="telp"
                            type="tel"
                            class="form-control @error('telp') is-invalid @enderror"
                            name="telp"
                            placeholder="08xxxxxxxxxx"
                            aria-describedby="basic-addon13"
                            value="{{ Auth::user()->admin->no_hp }}"
                            autocomplete="tel-national"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="telp-errorMsg"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Alamat
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:home"></iconify-icon>
                        </span>
                        <input
                            id="address"
                            type="text"
                            class="form-control @error('address') is-invalid @enderror"
                            name="address"
                            placeholder="Your Address"
                            aria-describedby="basic-addon13"
                            value="{{ Auth::user()->admin->alamat }}"
                            autocomplete="address-line1"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="address-errorMsg"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label">
                        Email
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bx:at"></iconify-icon>
                        </span>
                        <input
                            id="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            placeholder="name@example.com"
                            aria-describedby="basic-addon13"
                            autocomplete="email"
                            value="{{ Auth::user()->email }}"
                        />
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="email-errorMsg"></span>
                    </div>
                </div>
                <div class="form-password-toggle mb-3">
                    <label class="form-label" for="basic-default-password12">Password</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon11">
                            <iconify-icon icon="bxs:lock-alt"></iconify-icon>
                        </span>
                        <input
                            id="bxs-lock-alt"
                            type="password"
                            class="form-control @error('password_edit') is-invalid @enderror"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="basic-default-password2"
                            name="password_edit"
                            autocomplete="current-password"
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        <span class="errorTxt" id="password_edit-errorMsg"></span>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="row">
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <button class="btn btn-primary btn-lg text-white" type="submit">Simpan</button>
                        </div>
                        <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <a class="btn btn-danger btn-lg text-white" type="button" href="{{ route('myprofile') }}">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /Account -->
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.2/dist/iconify-icon.min.js"></script>

    <!-- AJAX -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- JS untuk Validation -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
    <script src="{{ asset('assets/js/validate.js') }}"></script>
@endsection
