@extends('admin.layout.app')
@section('title', 'Detail Dokumen')
@section('breadcrumb1', 'Laporan')
@section('breadcrumb2', 'Dokumen')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Data @yield('title')</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">@yield('breadcrumb1')</a></li>
                                <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="dom">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <p><strong>Judul:</strong> {{ $dokumen->judul }}</p>
                            <p><strong>Slug:</strong> {{ $dokumen->slug }}</p>
                            <p><strong>Deskripsi:</strong> {{ $dokumen->deskripsi }}</p>
                            <p><strong>Penulis:</strong> {{ $dokumen->penulis }}</p>
                            <p><strong>Tanggal Terbit:</strong> {{ \Carbon\Carbon::parse($dokumen->tanggal_terbit)->translatedFormat('d F Y') }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($dokumen->status) }}</p>
                        </div>

                        <div class="col-md-6 mb-2">
                            @if ($dokumen->gambar)
                                <p><strong>Gambar:</strong></p>
                                <img src="{{ asset('storage/' . $dokumen->gambar) }}"
                                     alt="Gambar Dokumen"
                                     class="img-fluid"
                                     style="width: 100px; height: auto; border:1px solid #ccc; padding:5px;">
                            @endif

                            @if ($dokumen->file)
                                <p class="mt-3"><strong>File Dokumen:</strong></p>
                                <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank" class="btn btn-primary">
                                    Lihat File
                                </a>
                            @endif
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
