{{-- Landing Page --}}

@if (Request::is('tentang'))
    <div class="landing-page-2">
        <div class="background-image">
            <div class="dark-overlay"></div>
        </div>
        <div class="content-2 konten">
            <h2 class="judul-home">Tentang Kami</h2>
            <p>Tentang Peminjaman barang logistik Telkom University Surabaya</p>
            <a href="/pinjam" class="btn">Pinjam Barang</a>
        </div>
    </div>
@else
    <div class="landing-page">
        <div class="background-image">
            <div class="dark-overlay"></div>
        </div>
        <div class="content konten">
            <h1 class="judul-home">Peminjaman Barang Logistik</h1>
            <p>Pinjam berbagai barang logistik Telkom University Surabaya</p>
            <a href="/pinjam" class="btn">Pinjam Barang</a>
        </div>
    </div>
@endif
