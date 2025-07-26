@extends('pages.layout.app')
@section('title', 'Anggota')
@section('content')

    <x-breadcrumb.breadcrumb-page title="Anggota" />


    <div class="team-area py-120">
        <div class="container">

            {{-- Judul --}}
            <div class="row w-100 mb-5">
                <div class="col-12 text-center">
                    <div class="site-heading">
                        <span class="site-title-tagline">
                            <i class="far fa-users"></i> Anggota Dewan Perwakilan Mahasiswa
                        </span>
                        <h2 class="site-title">Struktur Kepengurusan <span>DPM</span></h2>
                    </div>
                </div>
            </div>

            {{-- Ketua dan Wakil --}}
            <div class="row justify-content-center mb-5">
                @php
                    $pimpinan = [$ketua, $wakilKetua];
                @endphp
                @for ($i = 0; $i < count($pimpinan); $i++)
                    @if ($pimpinan[$i])
                        <div class="col-6 col-sm-4 col-md-4 col-lg-2 mb-4">
                            <a href="{{ route('detail-anggota', ['id' => $pimpinan[$i]->id]) }}">
                                <div class="team-item wow fadeInUp" data-wow-delay=".25s">

                                    @php
                                        $foto = $pimpinan[$i]->foto
                                            ? asset('storage/' . $pimpinan[$i]->foto)
                                            : asset(
                                                'temp-admin/app-assets/images/portrait/small/' .
                                                    ($pimpinan[$i]->jenis_kelamin === 'Perempuan'
                                                        ? 'avatar-wanita.png'
                                                        : 'avatar-laki.png'),
                                            );
                                    @endphp

                                    <div class="team-img" style="width: 100%; height: 200px; overflow: hidden;">
                                        <img src="{{ $foto }}" alt="{{ $pimpinan[$i]->nama }}"
                                            class="img-fluid w-100 h-100" style="object-fit: cover;">
                                    </div>

                                    <div class="team-content text-center">
                                        <div class="team-bio">
                                            <span>{{ $pimpinan[$i]->jabatan->nama_jabatan ?? '-' }}</span><br>
                                            <h5>
                                                <a href="{{ route('detail-anggota', ['id' => $pimpinan[$i]->id]) }}">
                                                    {{ $pimpinan[$i]->nama }}
                                                </a>
                                            </h5>
                                            <span>{{ $pimpinan[$i]->jurusan->nama ?? '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                @endfor
            </div>

            {{-- BPH --}}
            <div class="row justify-content-center mb-5">
                @php
                    $bphList = [$sekretaris1, $sekretaris2, $badanAnggaran1, $badanAnggaran2];
                @endphp

                <div class="row justify-content-center mb-5">
                    @foreach ($bphList as $anggota)
                        @if ($anggota)
                            <div class="col-6 col-sm-4 col-md-4 col-lg-2 mb-4">
                                <a href="{{ route('detail-anggota', ['id' => $anggota->id]) }}">
                                    <div class="team-item wow fadeInUp" style="font-size: 0.9rem;">
                                        <div class="team-img" style="width: 100%; height: 200px; overflow: hidden;">
                                            @php
                                                $defaultAvatar =
                                                    $anggota->jenis_kelamin === 'Perempuan'
                                                        ? 'avatar-wanita.png'
                                                        : 'avatar-laki.png';

                                                $foto = $anggota->foto
                                                    ? asset('storage/' . $anggota->foto)
                                                    : asset(
                                                        'temp-admin/app-assets/images/portrait/small/' . $defaultAvatar,
                                                    );
                                            @endphp

                                            <img src="{{ $foto }}" alt="{{ $anggota->nama }}" class="w-100 h-100"
                                                style="object-fit: cover;">
                                        </div>

                                        <div class="team-content">
                                            <div class="team-bio text-center mt-2">
                                                <span>{{ $anggota->jabatan->nama_jabatan ?? '-' }}</span><br>
                                                <h5 class="mb-1">{{ $anggota->nama }}</h5>
                                                <span>{{ $anggota->jurusan->nama ?? '-' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>

            {{-- Komisi --}}
            @foreach ($dataGabungan as $namaKomisi => $group)
                <h3 style="text-transform: uppercase; text-align: center;">
                    {{ $namaKomisi }}
                </h3>
                <div class="row justify-content-center mb-5">
                    {{-- Ketua komisi --}}
                    @for ($i = 0; $i < count($group['ketua']); $i++)
                        @php $ketua = $group['ketua'][$i]; @endphp
                        <div class="col-6 col-sm-4 col-md-4 col-lg-2 mb-4">
                            <a href="{{ route('detail-anggota', ['id' => $ketua->id]) }}">
                                <div class="team-item wow fadeInUp" style="font-size: 0.9rem;">
                                    <div class="team-img" style="width: 100%; height: 200px; overflow: hidden;">
                                        @php
                                            $defaultAvatar =
                                                $ketua->jenis_kelamin === 'Perempuan'
                                                    ? 'avatar-wanita.png'
                                                    : 'avatar-laki.png';

                                            $foto = $ketua->foto
                                                ? asset('storage/' . $ketua->foto)
                                                : asset(
                                                    'temp-admin/app-assets/images/portrait/small/' . $defaultAvatar,
                                                );
                                        @endphp

                                        <img src="{{ $foto }}" alt="{{ $ketua->nama }}" class="w-100 h-100"
                                            style="object-fit: cover;">
                                    </div>

                                    <div class="team-content">
                                        <div class="team-bio">
                                            <span>{{ $ketua->jabatan->nama_jabatan ?? '-' }}</span><br>
                                            <h5>{{ $ketua->nama }}</h5>
                                            <span>{{ $ketua->jurusan->nama ?? '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor

                    {{-- Anggota komisi --}}
                    @for ($i = 0; $i < count($group['anggota']); $i++)
                        @php $anggota = $group['anggota'][$i]; @endphp
                        <div class="col-6 col-sm-4 col-md-4 col-lg-2 mb-4">
                            <a href="{{ route('detail-anggota', ['id' => $anggota->id]) }}">
                                <div class="team-item wow fadeInUp" style="font-size: 0.9rem;">
                                    <div class="team-img" style="width: 100%; height: 200px; overflow: hidden;">
                                        @php
                                            $defaultAvatar =
                                                $anggota->jenis_kelamin === 'Perempuan'
                                                    ? 'avatar-wanita.png'
                                                    : 'avatar-laki.png';

                                            $foto = $anggota->foto
                                                ? asset('storage/' . $anggota->foto)
                                                : asset(
                                                    'temp-admin/app-assets/images/portrait/small/' . $defaultAvatar,
                                                );
                                        @endphp

                                        <img src="{{ $foto }}" alt="{{ $anggota->nama }}" class="w-100 h-100"
                                            style="object-fit: cover;">
                                    </div>

                                    <div class="team-content">
                                        <div class="team-bio">
                                            <span>{{ $anggota->jabatan->nama_jabatan ?? '-' }}</span><br>
                                            <h5>{{ $anggota->nama }}</h5>
                                            <span>{{ $anggota->jurusan->nama ?? '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            @endforeach

        </div>
    </div>

@endsection
