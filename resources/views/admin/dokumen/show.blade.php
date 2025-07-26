@extends('admin.layout.app')
@section('title', 'Detail Dokumen')
@section('breadcrumb1', 'Laporan')
@section('breadcrumb2', 'Dokumen')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Detail Dokumen</h3>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">@yield('breadcrumb1')</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="dokumen-detail">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title">Informasi Dokumen</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <p><strong>Judul:</strong> {{ $dokumen->judul }}</p>
                                <p><strong>Slug:</strong> {{ $dokumen->slug }}</p>
                                <p><strong>Deskripsi:</strong> {{ $dokumen->deskripsi }}</p>
                                <p><strong>Penulis:</strong> {{ $dokumen->penulis }}</p>
                                <p><strong>Tanggal Terbit:</strong> {{ \Carbon\Carbon::parse($dokumen->tanggal_terbit)->translatedFormat('d F Y') }}</p>
                                <p><strong>Status:</strong>
                                    <span class="badge {{ $dokumen->status == 'publish' ? 'badge-success' : 'badge-warning' }}">
                                        {{ ucfirst($dokumen->status) }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6 text-center">
                                @if ($dokumen->gambar)
                                    <p><strong>Gambar:</strong></p>
                                    <img src="{{ asset('storage/' . $dokumen->gambar) }}"
                                         alt="Gambar Dokumen"
                                         class="img-thumbnail mb-2"
                                         style="max-width: 200px;">
                                @endif

                                @if ($dokumen->file)
                                    <p><strong>File Dokumen:</strong></p>
                                    <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i data-feather="file-text"></i> Lihat File
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">
                                <i data-feather="arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
