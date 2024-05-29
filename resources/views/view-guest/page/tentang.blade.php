@extends('view-guest.layouts.app')

@section('content')
@include('view-guest.includes.landingpage')
<div class="container">
    <div class="section layout-home">
        <section id="about-us" class="py-5">
            <div class="row">
                <div class="col-lg-6">
                    <p>
                        Kami adalah platform yang menyediakan layanan peminjaman barang untuk memenuhi kebutuhan Anda.
                        Dengan sistem yang mudah digunakan, kami memastikan bahwa Anda dapat meminjam berbagai barang
                        dengan cepat dan efisien.
                    </p>
                    <p>
                        Misi kami adalah untuk memberikan solusi peminjaman yang terjangkau dan dapat diandalkan bagi
                        semua penghuni Telkom University Surabaya. Kami percaya bahwa dengan berbagi dan meminjam, kita
                        bisa mengurangi pemborosan dan mempermudah para penyelenggara acara untuk mendapatkan properti
                        yang dibutuhkan.
                    </p>
                    <p>
                        Tim kami terdiri dari para profesional yang berdedikasi untuk memberikan layanan terbaik dan
                        memastikan kepuasan Anda. Kami selalu siap membantu dan memberikan dukungan kapan pun Anda
                        membutuhkannya.
                    </p>
                </div>
            </div>

            <h2>Our Team</h2>
            <div class="team-section">
                <div class="column">
                    <div class="card">
                        <img src="{{ asset('images/FotoMerahDanis.png') }}" alt="Denis kopling" width="60px">
                        <div class="container">
                            <h2>Jane Doe</h2>
                            <p class="title">CEO & Founder</p>
                            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p>jane@example.com</p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="/w3images/team2.jpg" alt="Mike">
                        <div class="container">
                            <h2>Mike Ross</h2>
                            <p class="title">Art Director</p>
                            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p>mike@example.com</p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="/w3images/team3.jpg" alt="John">
                        <div class="container">
                            <h2>John Doe</h2>
                            <p class="title">Designer</p>
                            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p>john@example.com</p>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <img src="/w3images/team3.jpg" alt="John">
                        <div class="container">
                            <h2>John Doe</h2>
                            <p class="title">Designer</p>
                            <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                            <p>john@example.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ url('/contact') }}" class="btn btn-primary">Hubungi Kami</a>
            </div>
        </section>
    </div>
</div>
@endsection
