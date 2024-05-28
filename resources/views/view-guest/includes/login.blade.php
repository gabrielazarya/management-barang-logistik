<link href="{{ asset('css/Guest/login.css') }}" rel="stylesheet">

@if (Route::has('login'))
    <nav class="login-register-uwu">
        @auth
            @if (auth()->user()->role === 'admin')
                <a href="{{ url('/informasi') }}" class="rounded-md px-3 py-2 login-register-button-uwu">
                    Halaman Admin
                </a>
            @elseif(auth()->user()->role === 'user')
                <a href="{{ url('/ketersediaan') }}" class="rounded-md px-3 py-2 login-register-button-uwu">
                    Halaman Peminjaman
                </a>
            @endif
        @else
            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 login-register-button-uwu">
                Log in
            </a>

            {{-- @if (Route::has('register'))
                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 login-register-button-uwu">
                    Register
                </a>
            @endif --}}
        @endauth
    </nav>
@endif
