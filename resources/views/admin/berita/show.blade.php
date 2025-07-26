@extends('admin.layout.app')
@section('title', 'Lihat Berita')
@section('breadcrumb1', 'Berita')

@section('content')
    <div class="news-detail-area py-5">
        <div class="container">
            <div class="row">
                <!-- Main content -->
                <div class="col-lg-8">
                    <article class="news-article">
                        <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="thumbnail"
                             class="img-fluid w-100 mb-4"
                             style="height: 400px; object-fit: cover; border-radius: 8px;">

                        <h1 class="mb-3" style="font-weight: 700; font-size: 2.5rem;">{{ $berita->judul }}</h1>

                        <div class="news-meta mb-4 text-muted" style="font-size: 0.9rem;">
                            <span><i class="far fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($berita->tanggal_publish)->translatedFormat('d F Y') }}</span>
                            @if ($berita->kategori)
                                <span class="mx-3">|</span>
                                <span><i class="fas fa-tag"></i> {{ $berita->kategori->nama }}</span>
                            @endif
                        </div>

                        <div class="news-content"
                             style="font-size: 1.1rem; line-height: 1.8; color: #333; text-align: justify;">
                            {!! $berita->konten !!}
                        </div>
                    </article>
                </div>

                <!-- Sidebar berita lain -->
                <div class="col-lg-4">
                    <div class="sidebar-news p-3 rounded text-white" style="background: #313eb4 !important">
                        <h4 class="mb-4 fw-semibold text-white">Berita Lainnya</h4>
                        <ul class="list-unstyled">
                            @foreach ($beritaLainnya as $item)
                                <li class="mb-3 d-flex border-bottom border-secondary pb-2">
                                    <div style="flex-shrink: 0;">
                                        <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                             alt="{{ $item->judul }}"
                                             style="width: 80px; height: 60px; object-fit: cover; border-radius: 6px;">
                                    </div>
                                    <div class="ms-3">
                                        <a href="{{ route('berita.show', $item->id) }}"
                                           class="d-block fw-semibold text-white"
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
                </div>

            </div>
        </div>
    </div>
@endsection
