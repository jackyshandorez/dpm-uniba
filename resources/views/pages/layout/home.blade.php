@extends('pages.layout.app')
@section('title', 'Beranda')

@section('content')
    <div>

        <!-- hero slider -->
        <div class="hero-section">
            <div class="hero-slider owl-carousel owl-theme">
                <div class="hero-single"
                    style="background: url({{ asset('temp-pages') }}/assets/img/slider/wisuda-uniba.jpeg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-7">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInDown" data-delay=".25s">
                                        <i class="far fa-users"></i>Selamat Datang Di Website <br> Dewan Perwakilan
                                        Mahasiswa
                                    </h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        Mewujudkan Kepemimpinan yang Berintegritas dan Berkeadilan
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        DPM Universitas KH Bahaudin Mudhary Madura berkomitmen untuk mengembangkan
                                        partisipasi mahasiswa dalam setiap pengambilan keputusan dan kebijakan kampus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single"
                    style="background: url({{ asset('temp-pages') }}/assets/img/slider/wisuda-uniba-2.jpeg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-7">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInDown" data-delay=".25s">
                                        <i class="far fa-users"></i>Selamat Datang Di Website <br> Dewan Perwakilan
                                        Mahasiswa
                                    </h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        Memperjuangkan Aspirasi Mahasiswa dengan Solidaritas
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        DPM sebagai wadah perjuangan mahasiswa, berperan aktif dalam mewujudkan
                                        kampus yang lebih baik melalui kebijakan yang inklusif dan responsif.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single" style="background: url({{ asset('temp-pages') }}/assets/img/slider/aula.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-7">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInDown" data-delay=".25s">
                                        <i class="far fa-users"></i>Selamat Datang Di Website <br> Dewan Perwakilan
                                        Mahasiswa
                                    </h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        Bersama Membangun Masa Depan Kampus yang Gemilang
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        DPM Universitas KH Bahaudin Mudhary Madura terus berupaya menciptakan lingkungan
                                        kampus yang lebih baik melalui kebijakan yang pro-mahasiswa dan berorientasi
                                        pada kemajuan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- hero slider end -->


        <!-- feature area -->
        <div class="feature-area fa-negative">
            <div class="col-xl-9 ms-auto">
                <div class="feature-wrapper">
                    <div class="row g-4 feature-scroll">
                        <div class="col-md-6 col-lg-3 feature-slide-card">
                            <div class="feature-item">
                                <span class="count">01</span>
                                <div class="feature-icon">
                                    <img src="{{ asset('temp-pages') }}/assets/img/icon/teacher-2.svg" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4 class="feature-title">Kepemimpinan yang Kuat</h4>
                                    <p>DPM UNIBA berkomitmen untuk mencetak pemimpin masa depan dengan prinsip transparansi
                                        dan keberlanjutan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 feature-slide-card">
                            <div class="feature-item">
                                <span class="count">02</span>
                                <div class="feature-icon">
                                    <img src="{{ asset('temp-pages') }}/assets/img/icon/graduation.svg" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4 class="feature-title">Dukungan untuk Mahasiswa</h4>
                                    <p>DPM UNIBA memberikan berbagai layanan dan dukungan untuk mahasiswa, baik dalam bentuk
                                        program akademik maupun non-akademik.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 feature-slide-card">
                            <div class="feature-item">
                                <span class="count">03</span>
                                <div class="feature-icon">
                                    <img src="{{ asset('temp-pages') }}/assets/img/icon/information.svg" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4 class="feature-title">Kolaborasi Antar Organisasi</h4>
                                    <p>DPM UNIBA aktif menjalin kolaborasi dengan berbagai organisasi kemahasiswaan untuk
                                        menciptakan sinergi dalam kegiatan kampus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 feature-slide-card">
                            <div class="feature-item">
                                <span class="count">04</span>
                                <div class="feature-icon">
                                    <img src="{{ asset('temp-pages') }}/assets/img/icon/exchange-idea.svg" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4 class="feature-title">Advokasi Mahasiswa</h4>
                                    <p>DPM UNIBA berperan sebagai jembatan antara mahasiswa dan pihak kampus, memastikan hak
                                        dan kepentingan mahasiswa terlindungi dengan baik.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- feature area end -->


        <!-- about area -->
        <div class="about-area py-120">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                            <div class="about-img">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <img class="img-1" src="{{ asset('temp-pages') }}/assets/img/slider/kelas.jpeg"
                                            alt="">
                                        <div class="about-experience mt-4">
                                            <div class="about-experience-icon">
                                                <img src="{{ asset('temp-pages') }}/assets/img/icon/exchange-idea.svg"
                                                    alt="">
                                            </div>
                                            <b class="text-start">Mewakili Aspirasi <br> Mahasiswa UNIBA</b>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img class="img-2"
                                            src="{{ asset('temp-pages') }}/assets/img/slider/wisuda-uniba.jpeg"
                                            alt=""
                                            style="width: 200px; height: 200px; object-fit: cover; border-radius: 50%;">

                                        <img class="img-3 mt-4"
                                            src="{{ asset('temp-pages') }}/assets/img/slider/aula.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline">
                                    <i class="far fa-users"></i> Tentang Kami
                                </span>
                                <h2 class="site-title">
                                    Dewan Perwakilan Mahasiswa <span>UNIBA</span> Madura
                                </h2>
                            </div>
                            <p class="about-text">
                                DPM UNIBA Madura adalah lembaga legislatif mahasiswa yang berperan dalam menyalurkan
                                aspirasi,
                                mengawasi kinerja organisasi kemahasiswaan, dan menjaga jalannya roda organisasi sesuai
                                dengan prinsip demokrasi kampus.
                            </p>
                            <div class="about-content">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="about-item">
                                            <div class="about-item-icon">
                                                <img src="{{ asset('temp-pages') }}/assets/img/icon/open-book.svg"
                                                    alt="">
                                            </div>
                                            <div class="about-item-content">
                                                <h5>Legislatif Mahasiswa</h5>
                                                <p>Mengawal aspirasi dan kebutuhan mahasiswa dengan integritas dan tanggung
                                                    jawab.</p>
                                            </div>
                                        </div>
                                        <div class="about-item">
                                            <div class="about-item-icon">
                                                <img src="{{ asset('temp-pages') }}/assets/img/icon/global-education.svg"
                                                    alt="">
                                            </div>
                                            <div class="about-item-content">
                                                <h5>Kolaborasi Organisasi</h5>
                                                <p>Berperan aktif dalam membangun sinergi antar organisasi dan membina
                                                    kehidupan kampus yang dinamis.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="about-quote">
                                            <p>Kami percaya, suara mahasiswa adalah kekuatan untuk membangun kampus yang
                                                lebih baik dan berdaya saing.</p>
                                            <i class="far fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="about-bottom">
                                <a href="{{ route('tentang-page') }}" class="theme-btn">Lihat Selengkapnya<i
                                        class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- about area end -->


        <!-- counter area -->
        <div class="counter-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    {{-- Anggota DPM --}}
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <img src="{{ asset('temp-pages') }}/assets/img/icon/teacher-2.svg" alt="">
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="{{ $jumlahAnggota }}"
                                    data-speed="3000">{{ $jumlahAnggota }}</span>
                                <h6 class="title">+ Anggota DPM Sekarang</h6>
                            </div>
                        </div>
                    </div>

                    {{-- Demisioner --}}
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <img src="{{ asset('temp-pages') }}/assets/img/icon/graduation.svg" alt="">
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="{{ $jumlahAlumni }}"
                                    data-speed="3000">{{ $jumlahAlumni }}</span>
                                <h6 class="title">+ Demisioner</h6>
                            </div>
                        </div>
                    </div>

                    {{-- Dokumen --}}
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <img src="{{ asset('temp-pages') }}/assets/img/icon/course.svg" alt="">
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="{{ $jumlahDokumen }}"
                                    data-speed="3000">{{ $jumlahDokumen }}</span>
                                <h6 class="title">+ Dokumen</h6>
                            </div>
                        </div>
                    </div>

                    {{-- Berita --}}
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-box">
                            <div class="icon">
                                <img src="{{ asset('temp-pages') }}/assets/img/icon/award.svg" alt="">
                            </div>
                            <div>
                                <span class="counter" data-count="+" data-to="{{ $jumlahBerita }}"
                                    data-speed="3000">{{ $jumlahBerita }}</span>
                                <h6 class="title">+ Berita</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- counter area end -->

        <!-- team-area -->
        <div class="team-area py-120">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="site-heading">
                            <span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Dewan Perwakilan
                                Mahasiswa</span>
                            <h2 class="site-title">Struktur <span>Anggota</span></h2>
                            <p>Dewan Perwakilan Mahasiswa Universitas KH. Bahaudin Mudhary Madura.</p>
                        </div>
                    </div>
                </div>

                <div class="row team-scroll">
                    {{-- Ketua --}}
                    @if ($ketua)
                        <div class="col-md-6 col-lg-3 col-sm-12">
                            <div class="team-item wow fadeInUp" data-wow-delay=".25s">
                                @php
                                    $defaultAvatar =
                                        $ketua->jenis_kelamin === 'Perempuan' ? 'avatar-wanita.png' : 'avatar-laki.png';

                                    $foto = $ketua->foto
                                        ? asset('storage/' . $ketua->foto)
                                        : asset('temp-admin/app-assets/images/portrait/small/' . $defaultAvatar);
                                @endphp

                                <div class="team-img">
                                    <img src="{{ $foto }}" alt="Ketua" width="100%"
                                        style="object-fit: cover;">
                                </div>

                                <div class="team-content">
                                    <div class="team-bio">
                                        <h5><a
                                                href="{{ route('detail-anggota', ['id' => $ketua->id]) }}">{{ $ketua->nama }}</a>
                                        </h5>
                                        <span>{{ $ketua->jabatan->nama_jabatan }}</span>
                                        <h5>{{ $ketua->jurusan->nama }}</h5>
                                    </div>
                                </div>
                                <span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
                            </div>
                        </div>
                    @endif

                    {{-- Wakil Ketua --}}
                    @if ($wakilKetua)
                        <div class="col-md-6 col-lg-3 col-sm-12">
                            <div class="team-item wow fadeInUp" data-wow-delay=".50s">
                                @php
                                    $defaultAvatar =
                                        $wakilKetua->jenis_kelamin === 'Perempuan'
                                            ? 'avatar-wanita.png'
                                            : 'avatar-laki.png';

                                    $foto = $wakilKetua->foto
                                        ? asset('storage/' . $wakilKetua->foto)
                                        : asset('temp-admin/app-assets/images/portrait/small/' . $defaultAvatar);
                                @endphp

                                <div class="team-img">
                                    <img src="{{ $foto }}" width="100%" alt="Wakil Ketua"
                                        style="object-fit: cover;">
                                </div>

                                <div class="team-content">
                                    <div class="team-bio">
                                        <h5><a
                                                href="{{ route('detail-anggota', ['id' => $wakilKetua->id]) }}">{{ $wakilKetua->nama }}</a>
                                        </h5>
                                        <span>{{ $wakilKetua->jabatan->nama_jabatan }}</span>
                                        <h5>{{ $wakilKetua->jurusan->nama }}</h5>

                                    </div>
                                </div>
                                <span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
                            </div>
                        </div>
                    @endif

                    {{-- Sekretaris Jenderal 1 --}}
                    @if ($sekretaris1)
                        <div class="col-md-6 col-lg-3 col-sm-12">
                            <div class="team-item wow fadeInUp" data-wow-delay=".75s">
                                @php
                                    $defaultAvatar =
                                        $sekretaris1->jenis_kelamin === 'Perempuan'
                                            ? 'avatar-wanita.png'
                                            : 'avatar-laki.png';

                                    $foto = $sekretaris1->foto
                                        ? asset('storage/' . $sekretaris1->foto)
                                        : asset('temp-admin/app-assets/images/portrait/small/' . $defaultAvatar);
                                @endphp

                                <div class="team-img">
                                    <img src="{{ $foto }}" width="100%" alt="Sekretaris Jenderal 1"
                                        style="object-fit: cover;">
                                </div>

                                <div class="team-content">
                                    <div class="team-bio">
                                        <h5><a
                                                href="{{ route('detail-anggota', ['id' => $sekretaris1->id]) }}">{{ $sekretaris1->nama }}</a>
                                        </h5>
                                        <span>{{ $sekretaris1->jabatan->nama_jabatan }}</span>
                                        <h5>{{ $sekretaris1->jurusan->nama }}</h5>

                                    </div>
                                </div>
                                <span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
                            </div>
                        </div>
                    @endif

                    {{-- Badan Anggaran 1 --}}
                    @if ($badanAnggaran1)
                        <div class="col-md-6 col-lg-3 col-sm-12">
                            <div class="team-item wow fadeInUp" data-wow-delay="1s">
                                @php
                                    $defaultAvatar =
                                        $badanAnggaran1->jenis_kelamin === 'Perempuan'
                                            ? 'avatar-wanita.png'
                                            : 'avatar-laki.png';

                                    $foto = $badanAnggaran1->foto
                                        ? asset('storage/' . $badanAnggaran1->foto)
                                        : asset('temp-admin/app-assets/images/portrait/small/' . $defaultAvatar);
                                @endphp

                                <div class="team-img">
                                    <img src="{{ $foto }}" width="100%" alt="Badan Anggaran 1"
                                        style="object-fit: cover;">
                                </div>

                                <div class="team-content">
                                    <div class="team-bio">
                                        <h5><a
                                                href="{{ route('detail-anggota', ['id' => $badanAnggaran1->id]) }}">{{ $badanAnggaran1->nama }}</a>
                                        </h5>
                                        <span>{{ $badanAnggaran1->jabatan->nama_jabatan }}</span>
                                        <h5>{{ $badanAnggaran1->jurusan->nama }}</h5>

                                    </div>
                                </div>
                                <span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-12 text-end mt-4">
                        <div class="nav-right-btn mt-2">
                            <a href="/anggota/daftar" class="theme-btn"><span class="fal fa-arrow-right"></span> Lihat
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- team-area end -->
        <!-- testimonial area -->
        <div class="counter-area pt-60 pb-60">
        </div>
        <!-- testimonial area end -->

        <div class="event-area bg py-120">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="site-heading">
                            <span class="site-title-tagline"><i class="far fa-newspaper"></i> Berita</span>
                            <h2 class="site-title"><span>Dewan Perwakilan Mahasiswa</span></h2>
                            <p>Ikuti informasi dan kegiatan terbaru dari Dewan Perwakilan Mahasiswa Universitas.</p>
                        </div>
                    </div>
                </div>
                <div class="row news-scroll">
                    @foreach ($berita as $item)
                        <div class="col-md-6 col-lg-4 mb-4 news-slide-card">
                            <div class="course-item wow fadeInUp" data-wow-delay=".25s">
                                <div class="course-img">
                                    <span class="course-tag"><i class="far fa-bookmark"></i>
                                        {{ $item->kategori->nama ?? '-' }}</span>
                                    <!-- Gambar dengan ukuran tetap -->
                                    @php
                                        $thumbnail = $item->thumbnail
                                            ? asset('storage/' . $item->thumbnail)
                                            : asset('temp-admin/berita/thubnail-berita.jpeg');
                                    @endphp

                                    <img src="{{ $thumbnail }}" class="img-fluid"
                                        style="width: 100%; height: 200px; object-fit: cover;">

                                    <a href="/berita/{{ $item->id }}" class="btn">
                                        <i class="far fa-link"></i>
                                    </a>

                                </div>
                                <div class="course-content">
                                    <div class="course-meta">
                                        <span class="course-meta-left"><i class="far fa-calendar"></i>
                                            {{ \Carbon\Carbon::parse($item->tanggal_publish)->format('d M Y') }}</span>
                                    </div>
                                    <h4 class="course-title">
                                        <a href="#">{{ Str::limit($item->judul, 65, '...') }}</a>
                                    </h4>
                                    <p class="course-text">
                                        {{ Str::limit(strip_tags($item->konten), 85, '...') }}
                                    </p>
                                    <div class="course-bottom">
                                        <div class="course-bottom-left small"> {{-- class 'small' dari Bootstrap --}}
                                            <span><i class="far fa-users"></i> {{ $item->views }} Views</span>
                                            <span><i class="far fa-comment"></i> {{ $item->komentars->count() }}
                                                Komentar</span>
                                            <span><i class="far fa-clock"></i>
                                                {{ \Carbon\Carbon::parse($item->tanggal_publish)->diffForHumans() }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12 text-end mt-4">
                        <div class="nav-right-btn mt-2">
                            <a href="/berita" class="theme-btn"><span class="fal fa-arrow-right"></span>Lihat
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- event area end -->


        <!-- enroll area-->
        <div class="enroll-area pt-80 pb-80">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="enroll-right wow fadeInUp" data-wow-delay=".25s">
                                <div class="skill-content">
                                    <div class="site-heading mb-3">
                                        <span class="site-title-tagline"><i class="far fa-book-open-reader"></i>
                                            Tentang Kami</span>
                                        <h2 class="site-title text-white">
                                            Aspirasi Mahasiswa <span>DPM UNIBA Madura</span>
                                        </h2>
                                    </div>
                                    <p class="text-white">
                                        Dewan Perwakilan Mahasiswa Universitas KH. Bahaudin Mudhary Madura berkomitmen
                                        menjadi jembatan antara mahasiswa dan pihak kampus dalam menyampaikan aspirasi,
                                        keluhan, dan ide-ide konstruktif untuk kemajuan bersama.
                                    </p>
                                    <div class="skills-section">
                                        <div class="progress-box">
                                            <h5>Aspirasi Tersampaikan <span class="pull-right">90%</span></h5>
                                            <div class="progress" data-value="90">
                                                <div class="progress-bar" role="progressbar"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box">
                                            <h5>Tindak Lanjut Aspirasi <span class="pull-right">80%</span></h5>
                                            <div class="progress" data-value="80">
                                                <div class="progress-bar" role="progressbar"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box">
                                            <h5>Kepuasan Mahasiswa <span class="pull-right">85%</span></h5>
                                            <div class="progress" data-value="85">
                                                <div class="progress-bar" role="progressbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="enroll-left wow fadeInLeft" data-wow-delay=".25s">
                                <div class="enroll-form">
                                    <div class="enroll-form-header">
                                        <h3>Sampaikan Aspirasi Anda</h3>
                                        <p>Kami siap mendengarkan suara dan aspirasi seluruh mahasiswa.</p>
                                    </div>
                                    <form action="{{ route('aspirasi.store') }}">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Nama Lengkap">
                                        </div>
                                        {{-- <div class="form-group">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Alamat Email">
                                        </div> --}}
                                        <div class="form-group">
                                            <select name="jurusan" class="form-select">
                                                <option value="">-- Pilih Jurusan --</option>
                                                @foreach ($jurusan as $item)
                                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-select" name="kategori">
                                                <option value="">Pilih Kategori Aspirasi</option>
                                                <option value="akademik">Akademik</option>
                                                <option value="fasilitas">Fasilitas Kampus</option>
                                                <option value="kegiatan">Kegiatan Mahasiswa</option>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Tulis Aspirasi Anda" rows="4"></textarea>
                                        </div>
                                        <a href="/formulir" class="theme-btn">Detail Formulir<i
                                                class="fas fa-arrow-right-long"></i></a>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- enroll area end -->

        <!-- blog area -->
        <div class="blog-area py-120">
            <div class="container">
                <div class="row ">
                    <div class="col-12 text-center">
                        <div class="site-heading">
                            <span class="site-title-tagline"><i class="far fa-file-alt"></i> Dokumen</span>
                            <h2 class="site-title">Dewan <span>Perwakilan Mahasiswa</span></h2>
                            <p>Kumpulan dokumen resmi sebagai pedoman dalam pelaksanaan tugas dan fungsi Dewan Perwakilan
                                Mahasiswa.</p>
                        </div>
                    </div>
                </div>

                <div class="row doc-scroll">
                    @foreach ($dokumen as $item)
                        <div class="col-md-6 col-lg-4 mb-4 doc-slide-card">
                            <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                <!-- Tanggal Terbit -->
                                <div class="blog-date"><i class="fal fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d F Y') }}
                                </div>

                                <!-- Gambar -->
                                <div class="blog-item-img">
                                    <div class="ratio ratio-4x3">
                                        <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('temp-pages/assets/img/blog/01.jpg') }}"
                                            alt="Thumb" class="img-fluid rounded"
                                            style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                </div>

                                <!-- Info Dokumen -->
                                <div class="blog-item-info">
                                    <div class="blog-item-meta">
                                        <ul>
                                            <li><a href="#"><i class="far fa-user-circle"></i> Oleh
                                                    {{ $item->penulis ?? 'DPM' }}</a></li>
                                        </ul>
                                    </div>
                                    <h4 class="blog-title">
                                        <a href="{{ url('/laporan/dokumen/' . $item->slug) }}">{{ $item->judul }}</a>
                                    </h4>

                                    <!-- Link Lihat Dokumen -->
                                    @if ($item->file)
                                        <a class="theme-btn" href="{{ asset('storage/' . $item->file) }}"
                                            target="_blank">
                                            Lihat Dokumen<i class="fas fa-arrow-right-long"></i>
                                        </a>
                                    @else
                                        <p class="text-muted">Dokumen tidak tersedia</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Button Lihat Selengkapnya -->
                <div class="row">
                    <div class="col-12 text-end mt-4">
                        <div class="nav-right-btn mt-2">
                            <a href="/dokumen" class="theme-btn"><span class="fal fa-arrow-right"></span>Lihat
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- blog area end -->


        <!-- testimonial area -->
        <div class="counter-area ts-bg pt-80 pb-80">
        </div>
        <!-- testimonial area end -->





        <!-- partner area -->
        <!-- partner area -->
        <div class="partner-area bg pt-50 pb-50">
            <div class="container-fluid"> {{-- Gunakan container-fluid agar lebar penuh --}}
                <div class="partner-wrapper partner-slider owl-carousel owl-theme text-center">
                    @foreach ($organisasi as $org)
                        @if ($org->logo)
                            <div class="item">
                                @if ($org->link)
                                    <a href="{{ $org->link }}" target="_blank" rel="noopener noreferrer">
                                        <img src="{{ asset('storage/' . $org->logo) }}" alt="{{ $org->nama }}"
                                            title="{{ $org->nama }}" class="logo-img">
                                    </a>
                                @else
                                    <img src="{{ asset('storage/' . $org->logo) }}" alt="{{ $org->nama }}"
                                        title="{{ $org->nama }}" class="logo-img">
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>




    </div>

    <style>
        .logo-img {
            width: 100%;
            max-width: 60px;
            height: auto;
            object-fit: contain;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .logo-img {
                max-width: 70px;
            }
        }

        @media (min-width: 1200px) {
            .logo-img {
                max-width: 90px;
            }
        }
    </style>


    <script>
        $(document).ready(function() {
            $('.partner-slider').owlCarousel({
                loop: true,
                margin: 15,
                autoplay: true,
                autoplayTimeout: 2500,
                smartSpeed: 600,
                stagePadding: 0,
                responsive: {
                    0: {
                        items: 3
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    }
                }
            });
        });
    </script>





@endsection
