@extends('pages.layout.app')
@section('title', 'Struktur Organisasi')
@section('href1', '/')
@section('href2', '/struktur-dpm')
@section('content')

    <x-breadcrumb.breadcrumb-page title="Struktur Organisasi" />

    <section class="struktur-dpm py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Struktur Organisasi DPM UNIBA Madura</h2>
                <p class="text-muted">Struktur lengkap Dewan Perwakilan Mahasiswa</p>
            </div>

            {{-- Kelompok berdasarkan kategori nama_jabatan --}}
            @php
                $kelompok = [
                    'Pimpinan Inti' => ['Ketua', 'Wakil Ketua', 'Sekretaris Jenderal I', 'Sekretaris Jenderal II'],
                    'Badan Anggaran' => ['Badan Anggaran I', 'Badan Anggaran II'],
                    'Komisi I – Legislasi' => ['Ketua Komisi I', 'Anggota Komisi I'],
                    'Komisi II – Advokasi' => ['Ketua Komisi II', 'Anggota Komisi II'],
                    'Komisi III – Controlling' => ['Ketua Komisi III', 'Anggota Komisi III'],
                    'Komisi IV – Kominfo' => ['Ketua Komisi IV', 'Anggota Komisi IV'],
                ];
            @endphp

            @foreach ($kelompok as $judul => $jabatanList)
                @if (Str::startsWith($judul, 'Komisi'))
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div
                                class="card border-start border-4 shadow-sm
                            @if (Str::contains($judul, 'I')) border-info
                            @elseif(Str::contains($judul, 'II')) border-primary
                            @elseif(Str::contains($judul, 'III')) border-danger
                            @elseif(Str::contains($judul, 'IV')) border-secondary @endif">
                                <div class="card-body text-center">
                                    <h5 class="fw-bold mb-3">{{ $judul }}</h5>
                                    <div class="row g-4">
                                        @foreach ($jabatanList as $nama)
                                            @php $jabatan = $jabatans->firstWhere('nama_jabatan', $nama); @endphp
                                            <div class="col-md-6">
                                                <div
                                                    class="p-3 rounded border h-100
                                                {{ Str::contains($nama, 'Anggota') ? 'bg-white' : 'bg-light' }} text-center">
                                                    <h6 class="fw-bold">{{ $jabatan->nama_jabatan }}</h6>
                                                    @if (Str::contains($nama, 'Anggota'))
                                                        <ul class="small text-muted mb-0 list-unstyled">
                                                            @foreach (explode('.', $jabatan->tanggung_jawab) as $tanggung)
                                                                @if (trim($tanggung))
                                                                    <li>{{ trim($tanggung) }}</li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p class="small text-muted">✔ {{ $jabatan->tanggung_jawab }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center  flex-wrap gap-3 text-center mb-5">
                        @foreach ($jabatanList as $nama)
                            @php $jabatan = $jabatans->firstWhere('nama_jabatan', $nama); @endphp
                            <div class="p-3 rounded shadow-sm border bg-white" style="width: 200px;">
                                <h6 class="fw-bold text-primary">{{ $jabatan->nama_jabatan }}</h6>
                                <p class="small text-muted">{{ $jabatan->tanggung_jawab }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </section>

@endsection
