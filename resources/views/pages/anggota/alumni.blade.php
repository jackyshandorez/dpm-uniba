@extends('pages.layout.app')
@section('title', 'Demisioner')
@section('content')
    <!-- breadcrumb -->
    <x-breadcrumb.breadcrumb-page title="Alumni" />
    <!-- breadcrumb end -->


    <!-- course-area -->
    <div class="alumni-area py-120">
        <div class="container">
            <div class="row w-100">
                <div class="col-12">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="far fa-graduation-cap"></i> Demisioner</span>
                        <h2 class="site-title">Dewan Perwakilan <span>Mahasiswa</span></h2>
                        <p>Demisioner Dewan Perwakilan Mahasiswa adalah bagian dari perjalanan panjang yang terus memberi
                            dampak
                            di dunia kampus dan masyarakat.</p>
                    </div>
                </div>
            </div>

            @foreach ($alumniByPeriode as $periode => $alumnis)
                <!-- Periode -->
                <div class="row mb-5">
                    <div class="col-12 text-center mb-3">
                        <h3>Periode {{ $periode }}</h3>
                    </div>

                    @forelse ($alumnis as $alumni)
                        <div class="col-2 col-sm-2 col-md-2 col-lg-2 mb-4">

                            <div class="alumni-item text-center" style="max-width: 160px; margin: 0 auto;">
                                @php
                                    $defaultFoto =
                                        $alumni->jenis_kelamin === 'Perempuan'
                                            ? 'avatar-wanita.png'
                                            : 'avatar-laki.png';

                                    $foto = $alumni->foto
                                        ? asset('storage/' . $alumni->foto)
                                        : asset('temp-admin/app-assets/images/portrait/small/' . $defaultFoto);
                                @endphp

                                <div class="alumni-img">
                                    <img src="{{ $foto }}" alt="Foto {{ $alumni->nama }}"
                                        class="img-fluid rounded-circle"
                                        style="width: 120px; height: 120px; object-fit: cover;">
                                </div>

                                <div class="alumni-content">
                                    <h5><a href="#">{{ $alumni->nama_alumni }}</a></h5>
                                    <span>{{ $alumni->jabatan->nama_jabatan ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>Tidak ada alumni untuk periode ini.</p>
                        </div>
                    @endforelse
                </div>
            @endforeach


            <!-- Anda bisa menambahkan bagian Angkatan 2021 dan 2020 dengan cara yang sama -->
        </div>
    </div>







    <!-- course-area -->
@endsection
