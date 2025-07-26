@extends('pages.layout.app')
@section('title', 'Anggota')
@section('content')
    <!-- breadcrumb -->
    <x-breadcrumb.breadcrumb-page title="Anggota-detail" title1="Anggota" href="{{ route('anggota-page') }}" />
    <!-- breadcrumb end -->


    <div class="team-single pt-120 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="team-single-img">
                        @php
                            $defaultAvatar =
                                $anggota->jenis_kelamin === 'Perempuan' ? 'avatar-wanita.png' : 'avatar-laki.png';

                            $foto = $anggota->foto
                                ? asset('storage/' . $anggota->foto)
                                : asset('temp-admin/app-assets/images/portrait/small/' . $defaultAvatar);
                        @endphp

                        <img src="{{ $foto }}" alt="Foto {{ $anggota->nama }}" class="w-100 h-auto"
                            style="object-fit: cover;">

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="team-details">
                        <h3>{{ $anggota->nama }}</h3>
                        <strong>{{ $anggota->jabatan->nama_jabatan ?? '-' }} - Dewan Perwakilan Mahasiswa UNIBA
                            Madura</strong>
                        <p class="mt-3">
                            {{ $anggota->deskripsi ?? 'Anggota aktif DPM UNIBA Madura.' }}
                        </p>
                        <p class="mt-3">{{ $anggota->nama }} adalah mahasiswa aktif dari Program Studi
                            {{ $anggota->jurusan->nama ?? 'tidak tersedia' }}, Fakultas
                            {{ $anggota->jurusan->fakultas->nama ?? 'tidak diketahui' }}, Universitas KH Bahaudin Mudhary
                            Madura. Ia lahir pada tanggal
                            {{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->translatedFormat('d F Y') }}
                            dan saat ini tinggal di {{ $anggota->alamat }}. Dengan semangat organisasi yang tinggi,
                            {{ $anggota->nama }} saat ini menjabat sebagai {{ $anggota->jabatan->nama_jabatan }} pada
                            Dewan Perwakilan Mahasiswa Universitas KH. Bahaudin Mudhary Madura.
                        </p>

                        <div class="team-details-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><i class="far fa-location-dot"></i> {{ $anggota->alamat ?? '-' }}</li>
                                        <li><i class="far fa-envelope"></i> {{ $anggota->email ?? '-' }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li><i class="far fa-phone"></i> {{ $anggota->telepon ?? '-' }}</li>
                                        <li><i class="far fa-id-badge"></i> NIM: {{ $anggota->nik ?? '-' }}</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- biography & skill end -->
@endsection
