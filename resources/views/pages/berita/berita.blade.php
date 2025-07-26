@extends('pages.layout.app')
@section('title', 'Berita')
{{-- @section('href1', '/') --}}
{{-- @section('href2', '/berita') --}}
@section('content')
    <!-- breadcrumb -->
    <x-breadcrumb.breadcrumb-page title="Berita" />
    <!-- breadcrumb end -->


    <!-- course-area -->
    <div class="course-area py-120">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="far fa-newspaper"></i> Berita</span>
                        <h2 class="site-title">Berita Terbaru <br><span>Dewan Perwakilan Mahasiswa</span></h2>
                        <p>Ikuti informasi dan kegiatan terbaru dari Dewan Perwakilan Mahasiswa Universitas.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($berita as $item)
                    <div class="col-6 col-md-6 col-lg-4 mb-4">
                        <div class="course-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="course-img">
                                <span class="course-tag"><i class="far fa-bookmark"></i>
                                    {{ $item->kategori->nama ?? '-' }}</span>
                                <!-- Gambar dengan ukuran tetap -->
                                <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : asset('temp-admin/berita/thubnail-berita.jpeg') }}"
                                    class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;">
                                <a href="{{ route('berita-detail-page', $item->id) }}" class="btn"><i
                                        class="far fa-link"></i></a>
                            </div>
                            <div class="course-content">
                                <div class="course-meta">
                                    <span class="course-meta-left"><i class="far fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal_publish)->format('d M Y H:i') }}

                                </div>
                                <h4 class="course-title">
                                    <a
                                        href="{{ route('berita-detail-page', $item->id) }}">{{ Str::limit($item->judul, 65, '...') }}</a>
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


            <!-- pagination -->
            <div class="pagination-area">
                <nav>
                    <ul class="pagination justify-content-center">
                        {{-- Tombol Previous --}}
                        <li class="page-item {{ $berita->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $berita->previousPageUrl() ?? '#' }}" tabindex="-1"
                                aria-disabled="{{ $berita->onFirstPage() ? 'true' : 'false' }}">
                                <i class="far fa-arrow-left"></i>
                            </a>
                        </li>

                        {{-- Tentukan range halaman yang tampil maksimal 5 --}}
                        @php
                            $totalPages = $berita->lastPage();
                            $currentPage = $berita->currentPage();
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
                                <a class="page-link" href="{{ $berita->url($page) }}">{{ $page }}</a>
                            </li>
                        @endfor

                        {{-- Tombol Next --}}
                        <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $berita->nextPageUrl() ?? '#' }}"
                                aria-disabled="{{ $currentPage == $totalPages ? 'true' : 'false' }}">
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            {{-- <div class="pagination-area">
                {{ $berita->links('vendor.pagination.bootstrap-4') }}
            </div> --}}
            <!-- pagination end -->
        </div>
    </div>
    <!-- course-area -->
@endsection
