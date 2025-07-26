@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row"></div>
            <div class="content-body">
                <div class="row mb-1">
                    <div class="col-12">
                        <div class="card pull-up welcome-card rounded-5 fade-in">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h1 class="text-white mb-2 fw-bold">
                                            <i class="fas fa-sun me-3"></i>
                                            Selamat Datang, <strong>{{ Auth::user()->name }}</strong> 👋
                                        </h1>
                                        <p class="text-white mb-0 fs-5 opacity-90">
                                            Semoga hari Anda penuh berkah dan produktif. Mari kelola sistem dengan semangat!
                                            🌟
                                        </p>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <i class="fas fa-chart-line text-white opacity-75" style="font-size: 4rem;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 1: Statistik Alumni (8 kolom) + Kolom kanan (4 kolom) -->
                <div class="row">
                    <!-- Statistik Alumni (8 kolom) -->
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Statistik Anggota per Periode</h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <button type="button"
                                                class="btn btn-glow btn-round btn-bg-gradient-x-blue-cyan">
                                                Lihat Detail
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body p-0 pb-0">
                                    <div class="chartist px-2 pt-1">
                                        <canvas id="alumniChart" class="height-350"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom kanan gabung Admin + Aspirasi vertikal -->
                    <div class="col-lg-4 col-md-12 d-flex flex-column gap-1">
                        <!-- Jumlah Admin -->
                        <div class="card pull-up border-top-success border-top-3 rounded-5">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Admin</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body text-center">
                                    <h2 class="font-large-1 text-bold-400">{{$jumlahAdmin}}</h2>
                                    <p class="blue-grey lighten-2 mb-0">Admin Terdaftar</p>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Aspirasi -->
                        <div class="card pull-up border-top-warning border-top-3 rounded-5">
                            <div class="card-header">
                                <h4 class="card-title">Total Anggota</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body text-center">
                                    <h2 class="font-large-1 text-bold-400">{{ $jumlahGabungan}}</h2>
                                    <p class="blue-grey lighten-2 mb-0">Seluruh Periode </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- Statistik Utama -->
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Periode Sekarang</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body p-0 pb-0">
                                    <div class="row text-center">
                                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5">
                                            <h2 class="font-large-1 text-bold-400">{{ $jumlahAnggota }}</h2>
                                            <p class="blue-grey lighten-2 mb-0">Jumlah Anggota</p>
                                        </div>
                                        <div class="col-md-4 col-12 border-right-blue-grey border-right-lighten-5">
                                            <h2 class="font-large-1 text-bold-400">{{ $jumlahLaki }}</h2>
                                            <p class="blue-grey lighten-2 mb-0">Laki-Laki</p>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <h2 class="font-large-1 text-bold-400">{{ $jumlahPerempuan }}</h2>
                                            <p class="blue-grey lighten-2 mb-0">Perempuan</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <span class="text-muted text-center d-block">Statistik Anggota Manual</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card pull-up border-top-success  border-top-3 rounded-5">
                            <div class="card-header">
                                <h4 class="card-title"> Dokumen</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body text-center">
                                    <h2 class="font-large-1 text-bold-400">{{ $jumlahDokumen }}</h2>
                                    <p class="blue-grey lighten-2 mb-0">Arsip Dokumen</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Surat Masuk / Keluar dan Alumni -->
                <div class="row">

                    <div class="col-md-6">
                        <div class="card pull-up border-top-warning border-top-3 rounded-5">
                            <div class="card-header">
                                <h4 class="card-title">Surat Masuk</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body text-center">
                                    <h2 class="font-large-1 text-bold-400">{{ $jumlahMasuk }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card pull-up border-top-danger border-top-3 rounded-5">
                            <div class="card-header">
                                <h4 class="card-title">Surat Keluar</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body text-center">
                                    <h2 class="font-large-1 text-bold-400">{{ $jumlahKeluar }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Fakultas / Jurusan / Alumni -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card pull-up border-top-primary border-top-3 rounded-5">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Fakultas</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body text-center">
                                    <h2 class="font-large-1 text-bold-400">{{ $jumlahFakultas }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card pull-up border-top-info border-top-3 rounded-5">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Jurusan</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body text-center">
                                    <h2 class="font-large-1 text-bold-400">{{ $jumlahJurusan }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card pull-up border-top-success border-top-3 rounded-5">
                            <div class="card-header">
                                <h4 class="card-title">Jumlah Aspirasi</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body text-center">
                                    <h2 class="font-large-1 text-bold-400">{{ $jumlahAspirasi }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('alumniChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($alumniPerPeriode->keys()->concat(['Anggota Sekarang'])) !!},
                datasets: [{
                    label: 'Jumlah Alumni & Anggota',
                    data: {!! json_encode($alumniPerPeriode->values()->concat([$jumlahPengguna])) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
@endpush

@endsection
