@extends('view-guest.layouts.app')

@section('content')
    @include('view-guest.includes.landingpage')
    <div class="container">
        <div class="section layout-home">
            <div class="heading-home mb-2 text-center">Tentang Logistik</div>
            <p class="mb-4 text-center">Tentang Logistik Telkom University Surabaya</p>
            <div class="row mt-2">
                <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-xl-5 col-lg-2 col-md-12 col-sm-12">
                                <img src="{{ asset('images/home-tentang.png') }}" class="image-tentang img-fluid">
                            </div>
                            <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">
                                <div class="card-body">
                                    <p class="card-text ms-2">
                                        Dalam menghadapi kompleksitas kegiatan akademik dan non-akademik,
                                        Logistik Telkom University Surabaya hadir sebagai pendukung
                                        kelancaran berbagai kegiatan di lingkungan kampus. Dengan menyediakan
                                        layanan terbaik, kami bertujuan untuk memastikan ketersediaan barang-barang yang
                                        diperlukan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-xl-5 col-lg-2 col-md-12 col-sm-12">
                                <img src="{{ asset('images/home-tentang-2.png') }}" class="image-tentang img-fluid">
                            </div>
                            <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">
                                <div class="card-body">
                                    <p class="card-text ms-2">
                                        Kami berkomitmen untuk menyediakan layanan logistik yang efisien
                                        dan handal guna mendukung berbagai kebutuhan akademik dan
                                        administratif. Dengan tim yang berpengalaman dan sistem manajemen
                                        yang terorganisir dengan baik, kami memastikan bahwa setiap permintaan
                                        peminjaman barang ditangani dengan cepat dan efisien.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="bg-light">
        <div class="container">
            <div class="section layout-home">
                <div class="text-center heading-home mb-2">Layanan Logistik</div>
                <p class="text-center mb-4">Layanan Logistik Telkom University Surabaya</p>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 text-center">
                        <i class="fas fa-toolbox layanan-logistik-icon mt-4 mb-4"></i>
                        <h4 style="color: #9f1521">Peminjaman Barang</h4>
                        <p>Logistik Telkom University Surabaya menyediakan layanan peminjaman
                            barang bagi mahasiswa, staf, dosen, dan karyawan. Dengan layanan ini,
                            maka seluruh masyarakat Telkom University Surabaya dapat meminjam
                            peralatan dan perlengkapan yang dibutuhkan untuk kegiatan akademis
                            dan administratif.
                        </p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 text-center">
                        <i class="fas fa-meteor layanan-logistik-icon mt-4 mb-4"></i>
                        <h4 style="color: #9f1521">Cepatnya Konfirmasi Barang Pinjaman</h4>
                        <p>
                            Konfirmasi barang pinjaman dilakukan sesegera mungkin
                            setelah permintaan peminjaman diajukan. Logistik Telkom University
                            Surabaya berkomitmen untuk memberikan konfirmasi dengan cepat kepada
                            peminjam mengenai ketersediaan barang yang diminta serta detail pengambilan
                            dan pengembalian.
                        </p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 text-center">
                        <i class="fas fa-medal  layanan-logistik-icon mt-4 mb-4"></i>
                        <h4 style="color: #9f1521">Kualitas Kelayakan Barang</h4>
                        <p>Kualitas dan kelayakan barang yang dipinjam dari Logistik Telkom University
                            Surabaya dijamin untuk memenuhi standar yang tinggi. Sebelum disediakan untuk
                            peminjaman, setiap barang melewati proses pemeriksaan dan pemeliharaan rutin
                            untuk memastikan bahwa mereka dalam kondisi yang baik dan siap digunakan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-indicator layout-home">
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col-lg-3 col-lg-3 col-md-6 col-sm-12 text-center">
                        <i class="fa fa-tools mb-4"></i>
                        <h3>1001</h3>
                        <p>Jumlah Barang yang tersedia di Logistik</p>
                    </div>
                    <div class="col-lg-3 col-lg-3 col-md-6 col-sm-12 text-center">
                        <i class="fa fa-user mb-4"></i>
                        <h3>10</h3>
                        <p>Jumlah Peminjam barang</p>
                    </div>
                    <div class="col-lg-3 col-lg-3 col-md-6 col-sm-12 text-center">
                        <i class="fa fa-check mb-4"></i>
                        <h3>1 Hari</h3>
                        <p>Estimasi Konfirmasi Peminjaman</p>
                    </div>
                    <div class="col-lg-3 col-lg-3 col-md-6 col-sm-12 text-center">
                        <i class="fa fa-star mb-4"></i>
                        <h3>Sangat Baik</h3>
                        <p>Kualitas Barang Terjamin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="section layout-home">
            <div class="text-center heading-home mb-2">Cara Mengajukan Peminjam Barang</div>
            <p class="text-center mb-4">Cara Mengajukan Peminjaman Barang Logistik Telkom University Surabaya</p>
            <div class="row">
                <div class="col-lg-3 col-lg-3 col-md-6 col-sm-12 text-center mb-2 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="color: #9f1521">Step 1</h4>
                            <i class="fa fa-scroll mb-4 mt-4 cara-home"></i>
                            <p class="card-text">
                                Lihat ketersediaan Barang yang akan di pinjam
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-3 col-md-6 col-sm-12 text-center mb-2 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="color: #9f1521">Step 2</h4>
                            <i class="fa fa-pen mb-4 mt-4 cara-home"></i>
                            <p class="card-text">
                                Isi Formulir Peminjaman Barang & Pilih Barang yang akan di pinjam
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-3 col-md-6 col-sm-12 text-center mb-2 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="color: #9f1521">Step 3</h4>
                            <i class="fa fa-spinner mb-4 mt-4 cara-home"></i>
                            <p class="card-text">
                                Ajukan Peminjaman Barang dan Tunggu Konfirmasi dari Admin
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-3 col-md-6 col-sm-12 text-center mb-2 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="color: #9f1521">Step 4</h4>
                            <i class="fa fa-download mb-4 mt-4 cara-home"></i>
                            <p class="card-text">
                                Admin akan mencetak Formulir saat sudah Terkonfirmasi
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <a href="/pinjam" class="btn merah mt-4">Pinjam Barang</a>
            </div>
        </div>
    </div>
@endsection
