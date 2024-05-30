@extends('view-guest.layouts.app')

@section('content')
@include('view-guest.includes.landingpage')
<div class="section-layout-home">
    <section id="about-us">
        <div class="container">
            <div class="heading-home mb-2 text-center">Tentang Logistik</div>
            <div class="mt-4 row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p>
                                Kami menyediakan layanan peminjaman barang untuk memenuhi kebutuhan Anda.
                                Dengan sistem yang mudah digunakan, kami memastikan bahwa Anda dapat meminjam berbagai
                                barang dengan cepat dan efisien.
                            </p>
                            <p>
                                Komitmen kami dalam menyediakan layanan peminjaman barang juga mencakup aspek
                                keberlanjutan lingkungan. Dengan demikian, kami berharap dapat menjadi bagian dari upaya
                                menjaga keberlanjutan lingkungan di Telkom University Surabaya.
                            </p>
                            <p>
                                Misi kami adalah untuk memberikan solusi peminjaman yang terjangkau dan dapat diandalkan
                                bagi semua penghuni Telkom University Surabaya. Kami percaya bahwa dengan berbagi dan
                                meminjam, kita bisa mengurangi pemborosan dan mempermudah para penyelenggara acara untuk
                                mendapatkan properti yang dibutuhkan.
                            </p>
                            <p>
                                Selain itu, kami juga senantiasa melakukan perbaikan dan peningkatan dalam layanan kami
                                untuk mendukung kemudahan akses bagi para pengguna. Kami selalu terbuka untuk menerima
                                masukan dan saran dari pengguna agar dapat terus memperbaiki sistem peminjaman sehingga
                                dapat lebih responsif terhadap berbagai kebutuhan. Dengan cara ini, kami berharap dapat
                                terus menjadi mitra yang dapat diandalkan dan memberikan kontribusi positif dalam
                                mendukung aktivitas dan acara di Telkom University Surabaya.
                            </p>
                            <p>
                                Tim kami terdiri dari para profesional yang berdedikasi untuk memberikan layanan terbaik
                                dan memastikan kepuasan Anda. Kami selalu siap membantu dan memberikan dukungan kapan
                                pun Anda membutuhkannya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section id="tim-kami">
        <div class="bg-light">
            <div class="container">
                <div class="heading-home mb-2 mt-4 pt-4 text-center">Tim Kami</div>
                <div class="team-section text-center">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <img class="images-tentang-kami" src="{{asset('images/Geby.jpeg')}}">
                            <div class="container">
                                <h4>Gabriel Azarya</h4>
                                <p class="title">1203220134</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <img class="images-tentang-kami" src="{{asset('images/Mahendra.jpeg')}}">
                            <div class="container">
                                <h4>Mahendra Prathama</h4>
                                <p class="title">1203222078</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <img class="images-tentang-kami" src="{{asset('images/Rengga.jpeg')}}">
                            <div class="container">
                                <h4>I Gede Arengga</h4>
                                <p class="title">1203220108</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <img class="images-tentang-kami" src="{{asset('images/Danis.jpeg')}}">
                            <div class="container">
                                <h4>Daniswara</h4>
                                <p class="title">1203220066</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="quotes">
    <div class="container text-center ">
        <div class="heading-home mt-4 mb-4">Quotes Inspiratif</div>
        <div class="mb-4 pb-1 ">
        <p>"In logistics, the difficulty is not in achieving perfection, but in consistently delivering excellence." - Katie Zobrist </p>
            <p>"Efficiency in logistics is not just about moving goods, but about moving value." - John Seely Brown</p>
            <p>"The key to successful campus logistics is synchronization - aligning the right resources at the right time." - Ben Van Heuvelen</p>
            <p>"Logistics excellence on campus is a blend of precision, focus, and adaptability." - Adam Moore</p>
            <p>"Strategic campus logistics management is the art of turning complexity into simplicity." - Chris Cooper</p>
        </div>
    </div>
    <div class="pb-4">
                <a href="/pinjam" class="btn merah mt-4 mb-4">Pinjam Barang</a>
            </div>
</section>
</div>
@endsection