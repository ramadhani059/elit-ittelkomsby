@extends('layout.admin')

@section('content')

<!-- Content -->
<div class="container-fluid my-4">
    <div class="row">
        <div class="col-sm-12 col-lg-5 mb-2">
            <img
                class="card-img"
                src="{{ asset('storage/information/'.$info->img_encrypt) }}"
                alt="About Us"
                width="100%"
            />
        </div>
        <div class="col-md-12 col-lg-7 mb-2">
            <div class="card p-4">
                <h3><strong>{{ $info->judul }}</strong></h3>
                <div class="row">
                    <div class="col-6 text-capitalize">
                        <p><strong>
                            <span><iconify-icon icon="bx:user" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                {{ $info->admin->nama_lengkap }}
                        </strong></p>
                    </div>
                    <div class="col-6 text-capitalize">
                        <p><strong>
                            <span><iconify-icon icon="bx:calendar" class="tf-icons bx"></iconify-icon></span>&nbsp;
                            {{ \Carbon\Carbon::parse($info->tanggal)->format('d/m/Y')}}
                        </strong></p>
                    </div>
                </div>
                <div style="text-align: justify;">
                    {!! $info->isi !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

@endsection
