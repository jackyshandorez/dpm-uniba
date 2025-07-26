@extends('admin.layout.app')
@section('title', 'Detail Pengguna')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Pengguna')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Detail Pengguna</h3>
            </div>
        </div>
        <div class="content-body">
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Aspirasi Mahasiswa</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p><strong>Nama:</strong> {{ $aspirasi->anonim ? 'Anonim' : $aspirasi->nama }}</p>
                                        <p><strong>NIM:</strong> {{ $aspirasi->anonim ? 'Disembunyikan' : $aspirasi->nim }}</p>
                                        <p><strong>Jurusan:</strong> {{ $aspirasi->jurusan }}</p>

                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Judul Aspirasi:</strong> {{ $aspirasi->judul_aspirasi }}</p>
                                        <p><strong>Semester:</strong> Semester {{ $aspirasi->semester }}</p>
                                        <p><strong>Dikirim pada:</strong>
                                            {{ \Carbon\Carbon::parse($aspirasi->created_at)->translatedFormat('d F Y, H:i') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <h5><strong>Isi Aspirasi</strong></h5>
                                    <div style="min-height: 300px; max-height: 600px; overflow-y: auto; padding: 20px; font-size: 1.2rem; line-height: 1.6; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 10px;">
                                        {{ $aspirasi->isi_aspirasi }}
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger mt-4" onclick="window.history.back()">
                                    <i data-feather="arrow-left"></i> Kembali
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
