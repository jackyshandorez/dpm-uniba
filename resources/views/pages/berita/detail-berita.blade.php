@extends('pages.layout.app')
@section('title', 'Berita')
@section('title1', 'Detail Berita')
@section('content')
    <!-- breadcrumb -->
    <x-breadcrumb.breadcrumb-page title1="Berita" title="Detail Berita" href="{{ route('berita-page') }}" />
    <!-- breadcrumb end -->

    <div class="news-detail-area py-5">
        <div class="container">
            <div class="row">
                <!-- Main content -->
                <div class="col-12 col-lg-8">
                    <article class="news-article">
                        {{-- Gambar --}}
                        <img src="{{ $berita->thumbnail ? asset('storage/' . $berita->thumbnail) : asset('temp-admin/berita/thubnail-berita.jpeg') }}"
                            alt="Thumbnail" class="img-fluid w-100 mb-4 rounded"
                            style="max-height: 400px; object-fit: cover;">

                        {{-- Meta Info --}}
                        <div class="news-meta mb-4 text-muted" style="font-size: clamp(0.75rem, 2.5vw, 0.95rem);">
                            {{-- Penulis --}}
                            <span>
                                <i class="fas fa-user"></i> {{ $berita->penulis ?? '-' }}
                            </span>

                            <span class="mx-2 d-none d-sm-inline">|</span>

                            {{-- Kategori --}}
                            <span>
                                <i class="fas fa-tag"></i> {{ $berita->kategori->nama ?? '-' }}
                            </span>

                            <span class="mx-2 d-none d-sm-inline">|</span>

                            {{-- Views --}}
                            <span>
                                <i class="far fa-eye"></i> {{ $berita->views ?? 0 }} Views
                            </span>

                            <span class="mx-2 d-none d-sm-inline">|</span>

                            {{-- Komentar --}}
                            <span>
                                <i class="far fa-comments"></i> {{ $berita->komentars->count() }} Komentar
                            </span>

                            <span class="mx-2 d-none d-sm-inline">|</span>

                            {{-- Tanggal Publish --}}
                            <span>
                                <i class="far fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal_publish)->translatedFormat('d F Y, H:i') }}
                            </span>
                        </div>
                        {{-- Judul Responsif --}}
                        <h1 class="mb-3 fw-bold" style="font-size: clamp(1.2rem, 5vw, 2.5rem);">
                            {{ $berita->judul }}
                        </h1>


                        {{-- Konten --}}
                        <div class="news-content"
                            style="font-size: clamp(0.9rem, 2vw, 1.1rem); line-height: 1.8; color: #333; text-align: justify;">
                            {!! $berita->konten !!}
                        </div>
                    </article>
                </div>


                <!-- Sidebar berita lain -->
                <div class="col-lg-4">
                    <div class="sidebar-news  p-3 rounded text-white" style="background: #ffc107 !important">
                        <h4 class="mb-4 fw-semibold text-white">Berita Lainnya</h4>
                        <ul class="list-unstyled">
                            @foreach ($beritaLainnya as $item)
                                <li class="mb-3 d-flex border-bottom border-secondary pb-2">
                                    <div style="flex-shrink: 0;">
                                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->judul }}"
                                            style="width: 80px; height: 60px; object-fit: cover; border-radius: 6px;">
                                    </div>
                                    <div class="ms-3">
                                        <a href="/berita/{{ $item->id }}" class="d-block fw-semibold text-white"
                                            style="font-size: 1rem;">
                                            {{ Str::limit($item->judul, 60, '...') }}
                                        </a>
                                        <small class="text-light" style="font-size: 0.85rem;">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($item->tanggal_publish)->format('d M Y') }}
                                        </small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Komentar -->
                    @include('pages.berita.komentar')
                    {{-- end komentar --}}


                </div>


            </div>




        </div>
    </div>
    </div>




@endsection
