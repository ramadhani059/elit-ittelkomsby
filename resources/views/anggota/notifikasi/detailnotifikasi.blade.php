@extends('layout.anggota')

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card p-4">
                    <h3><strong>Subject</strong></h3>
                    <div class="row">
                        <div class="col-6 text-capitalize">
                            <p><strong>
                                From : Administrator
                            </strong></p>
                        </div>
                        <div class="col-6 text-capitalize">
                            <p style="text-align: right;"><strong>
                                <span><iconify-icon icon="bx:calendar" class="tf-icons bx"></iconify-icon></span>&nbsp;
                                {{ \Carbon\Carbon::parse('2018-06-15 17:34:15.984512')->format('d/m/Y, h:m')}}
                            </strong></p>
                        </div>
                    </div>
                    <div style="text-align: justify;" class="mt-3">
                        Isi notifikasi
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
