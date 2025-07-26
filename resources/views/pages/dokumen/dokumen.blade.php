@extends('pages.layout.app')
@section('title', 'Dokumen')
@section('content')
    <!-- breadcrumb -->
    <x-breadcrumb.breadcrumb-page title="Dokumen" />
    <!-- breadcrumb end -->


    <!-- course-area -->
    <div class="dokumen-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="site-heading">
                        <span class="site-title-tagline"><i class="far fa-file-alt"></i> Peraturan & Dokumen</span>
                        <h2 class="site-title">Daftar Dokumen <span>DPM UNIBA Madura</span></h2>
                        <p class="site-description">Kumpulan dokumen resmi sebagai pedoman dalam pelaksanaan tugas dan
                            fungsi Dewan Perwakilan Mahasiswa.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Dokumen Pertama -->
                @foreach ($dokumen as $item)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2 mb-4">

                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-date fs-7">
                                <i class="fal fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d F Y') }}
                            </div>
                            <div class="blog-item-img">
                                <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : asset('temp-pages/assets/img/blog/01.jpg') }}"
                                    alt="Thumb" class="img-fluid" style="width: 100%; height: 150px; object-fit: cover;">
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul class="fs-7">
                                        <li><a href="#" class="fs-7"><i class="far fa-user-circle"></i> by
                                                {{ $item->penulis ?? 'DPM' }}</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title fs-6">
                                    <a href="{{ url('/laporan/dokumen/' . $item->slug) }}">{{ $item->judul }}</a>
                                </h4>
                                <!-- Link untuk download file dokumen -->
                                @if ($item->file)
                                    <a class="theme-btn fs-7 mt-2 px-2 py-1" style="font-size: 0.75rem; padding: 4px 10px;"
                                        href="{{ asset('storage/' . $item->file) }}" target="_blank">
                                        Lihat Dokumen <i class="fas fa-arrow-right-long"></i>
                                    </a>
                                @endif



                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="pagination-area">
                    <nav>
                        <ul class="pagination justify-content-center">
                            {{-- Tombol Previous --}}
                            <li class="page-item {{ $dokumen->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $dokumen->previousPageUrl() ?? '#' }}" tabindex="-1"
                                    aria-disabled="{{ $dokumen->onFirstPage() ? 'true' : 'false' }}">
                                    <i class="far fa-arrow-left"></i>
                                </a>
                            </li>

                            {{-- Tentukan range halaman yang tampil maksimal 5 --}}
                            @php
                                $totalPages = $dokumen->lastPage();
                                $currentPage = $dokumen->currentPage();
                                $maxPagesToShow = 10;

                                // Hitung start dan end page (sliding window)
                                $half = floor($maxPagesToShow / 2);
                                if ($totalPages <= $maxPagesToShow) {
                                    $start = 1;
                                    $end = $totalPages;
                                } else {
                                    if ($currentPage - $half <= 0) {
                                        $start = 1;
                                        $end = $maxPagesToShow;
                                    } elseif ($currentPage + $half > $totalPages) {
                                        $start = $totalPages - $maxPagesToShow + 1;
                                        $end = $totalPages;
                                    } else {
                                        $start = $currentPage - $half;
                                        $end = $currentPage + $half;
                                    }
                                }
                            @endphp

                            {{-- Loop nomor halaman --}}
                            @for ($page = $start; $page <= $end; $page++)
                                <li class="page-item {{ $currentPage == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $dokumen->url($page) }}">{{ $page }}</a>
                                </li>
                            @endfor

                            {{-- Tombol Next --}}
                            <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $dokumen->nextPageUrl() ?? '#' }}"
                                    aria-disabled="{{ $currentPage == $totalPages ? 'true' : 'false' }}">
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Dokumen Kedua -->

            </div>
        </div>
    </div>






    <!-- course-area -->
@endsection
