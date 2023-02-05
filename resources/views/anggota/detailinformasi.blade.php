@extends('layout.anggota')

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-md-12 col-lg-8">
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
                    <img
                        class="card-img"
                        src="{{ asset('storage/information/'.$info->img_encrypt) }}"
                        alt="About Us"
                        width="100%"
                    />
                    <div style="text-align: justify;" class="mt-3">
                        {!! $info->isi !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <h5 class="card-title text-uppercase">Informasi Penting</h5>
                @foreach($fullinfo as $daftarinfo)
                    @if ($daftarinfo->status == 'Aktif')
                        <p class="card-text">
                            <a href="{{ route('detailinformasi', ['slug' => $daftarinfo->slug]) }}">
                                <span class="badge bg-danger me-2">{{ \Carbon\Carbon::parse($daftarinfo->tanggal)->format('d/m/Y')}}</span><?php echo \Illuminate\Support\Str::limit(strip_tags($daftarinfo->judul), 60, $end='...') ?>
                            </a>
                        </p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
