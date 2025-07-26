@extends('pages.layout.app')
@section('title', 'Berita')
@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('temp-pages') }}/assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">@yield('title')</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">@yield('title')</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- course-area -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Dokumen: Anggaran Kegiatan 2024</h2>
                <p>Berikut adalah dokumen yang berisi anggaran kegiatan Dewan Perwakilan Mahasiswa Universitas KH Bahaudin Mudhary Madura untuk tahun 2024.</p>
            </div>

            <!-- Tampilan Dokumen -->
            <div class="row">
                <div class="col-md-6">
                    <!-- Tampilkan thumbnail atau preview gambar PDF -->
                    <img src="{{ asset('temp-pages/assets/img/blog/03.jpg') }}" alt="Anggaran Kegiatan" class="img-fluid" style="height: 500px; width: auto; object-fit: cover;">
                </div>

                <div class="col-md-6">
                    <h4 class="card-title">Anggaran Kegiatan 2024</h4>
                    <p class="card-text">
                        Dokumentasi anggaran kegiatan ini dapat diunduh untuk referensi lebih lanjut.
                    </p>
                    <!-- Tombol untuk melihat dan mengunduh PDF -->
                    <a href="/path/to/your/document.pdf" class="btn btn-primary" target="_blank">Lihat & Unduh Dokumen<i class="fas fa-arrow-right-long"></i></a>
                </div>
            </div>

        </div>
    </div>







    <!-- course-area -->
@endsection
