<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Peminjaman Barang Telkom University Surabaya</title>
    <link href="{{ asset('css/Guest/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Guest/landingpage.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo-icon.png') }}" type="image/png">

</head>

<body>
    @include('view-guest.includes.navbar')

    @yield('content')

    {{-- @if (Auth::check() && Auth::user()->is_admin) --}}
    @include('view-guest.includes.footer')
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
