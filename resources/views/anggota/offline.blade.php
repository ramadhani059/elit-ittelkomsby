@guest
    @if (Route::has('login'))
        @extends('layout.anggota')
        @section('content')
            <div class="misc-wrapper">
                <h1 class="mb-2 mx-2">Connect to the internet !!</h1>
                <p class="mb-4 mx-2">You're offline. Check your connection.</p>
            </div>
        @endsection
    @endif
@else
    @if ( Auth::user() -> level == 'anggota')
        @extends('layout.anggota')
        @section('content')
            <div class="misc-wrapper">
                <h1 class="mb-2 mx-2">Connect to the internet !!</h1>
                <p class="mb-4 mx-2">You're offline. Check your connection.</p>
            </div>
        @endsection
    @else
        @extends('layout.admin')
        @section('content')
            <div class="misc-wrapper">
                <h1 class="mb-2 mx-2">Connect to the internet !!</h1>
                <p class="mb-4 mx-2">You're offline. Check your connection.</p>
            </div>
        @endsection
    @endif
@endguest
