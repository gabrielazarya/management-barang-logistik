<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary mx-auto ininavbar">
    <div class="container">
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="/">
                <img src="{{ asset('images/logo-telkom-university-surabaya.webp') }}" height="60" />
            </a>

            <ul class="navbar-nav me-auto mb-2 mx-auto mb-lg-0">
                <li class="nav-item">
                    <a class="navbartext nav-link {{ request()->routeIs('guestDashboard') ? 'active' : '' }}"
                        href="{{ route('guestDashboard') }}">DASHBOARD</a>
                </li>
                <li class="nav-item">
                    <a class="navbartext nav-link {{ request()->routeIs('guestTentang') ? 'active' : '' }}"
                        href="{{ route('guestTentang') }}">TENTANG KAMI</a>
                </li>
            </ul>
            @include('view-guest.includes.login')
        </div>
    </div>
</nav>
