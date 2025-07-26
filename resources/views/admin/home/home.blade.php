@extends('admin.layout.app')
@section('content')
    <div class="content-area">
        <!-- Welcome Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card welcome-card fade-in">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h1 class="text-white mb-2 fw-bold">
                                    <i class="fas fa-sun me-3"></i>
                                    Selamat Datang, Admin!
                                </h1>
                                <p class="text-white mb-0 fs-5 opacity-90">
                                    Semoga hari Anda penuh berkah dan produktif. Mari kelola sistem dengan semangat! 🌟
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

        <!-- Statistics Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="section-title">Statistik Anggota</h2>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-blue mx-auto">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-number">1,247</div>
                        <p class="stats-label">Total Anggota</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-yellow mx-auto">
                            <i class="fas fa-mars"></i>
                        </div>
                        <div class="stats-number">687</div>
                        <p class="stats-label">Laki-laki</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-gradient mx-auto">
                            <i class="fas fa-venus"></i>
                        </div>
                        <div class="stats-number">560</div>
                        <p class="stats-label">Perempuan</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-green mx-auto">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="stats-number">892</div>
                        <p class="stats-label">Alumni</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Management Statistics -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="section-title">Statistik Manajemen</h2>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-blue mx-auto">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="stats-number">2,156</div>
                        <p class="stats-label">Total Dokumen</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-green mx-auto">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <div class="stats-number">143</div>
                        <p class="stats-label">Surat Masuk</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-orange mx-auto">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div class="stats-number">97</div>
                        <p class="stats-label">Surat Keluar</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-pink mx-auto">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="stats-number">68</div>
                        <p class="stats-label">Aspirasi</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Statistics -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="section-title">Statistik Akademik</h2>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-blue mx-auto">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="stats-number">12</div>
                        <p class="stats-label">Total Fakultas</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card stats-card fade-in">
                    <div class="card-body text-center p-4">
                        <div class="icon-box icon-yellow mx-auto">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stats-number">48</div>
                        <p class="stats-label">Total Jurusan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.style.transform = sidebar.style.transform === 'translateX(0px)' ? 'translateX(-100%)' :
                'translateX(0px)';
        }

        // Auto-hide sidebar on mobile
        if (window.innerWidth <= 768) {
            document.getElementById('sidebar').style.transform = 'translateX(-100%)';
        }

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stats-number');
            counters.forEach(counter => {
                const target = parseInt(counter.textContent.replace(/,/g, ''));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                }, 16);
            });
        }

        // Start counter animation after page load
        window.addEventListener('load', () => {
            setTimeout(animateCounters, 500);
        });
    </script>
@endsection
