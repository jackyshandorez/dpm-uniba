    @extends('pages.layout.app')
    @section('title', 'Berita')
    @section('href1', '/')
    @section('href2', '/berita')
    @section('content')
        <!-- breadcrumb -->
        <x-breadcrumb.breadcrumb-page title="Tentang DPM" />
        <!-- breadcrumb end -->


        <!-- course-area -->

        <section class="course-area pt-40 pb-100">
            <div class="container">
                <div class="how-apply pt-120 pb-80">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="content-info wow fadeInUp" data-wow-delay=".25s">
                                <div class="site-heading mb-3">
                                    <span class="site-title-tagline">
                                        <i class="far fa-university"></i> Tentang DPM
                                    </span>
                                    <h2 class="site-title">
                                        Profil <span>Dewan Perwakilan Mahasiswa</span>
                                    </h2>
                                </div>
                                <p class="content-text" style="text-align: justify;">
                                    DPM (Dewan Perwakilan Mahasiswa) adalah lembaga legislatif mahasiswa yang memiliki
                                    fungsi legislasi, pengawasan, dan advokasi terhadap kebijakan kampus serta mengawal
                                    aspirasi mahasiswa secara demokratis dan partisipatif.
                                </p>
                                <p class="content-text mt-2" style="text-align: justify;">
                                    DPM UNIBA Madura berperan sebagai penghubung antara mahasiswa dan pihak kampus serta
                                    mengawasi jalannya organisasi mahasiswa agar sesuai dengan peraturan dan etika
                                    kelembagaan.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="content-img wow fadeInRight" data-wow-delay=".25s">
                                <img src="{{ asset('temp-pages') }}/assets/img/apply/01.jpg" alt="Gambar Profil DPM" class="img-fluid w-75">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="details-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="details-left">
                                <h3 class="mb-3">Visi</h3>
                                <p>
                                    Terwujudnya lembaga legislatif mahasiswa yang profesional, kritis, dan solutif dalam
                                    mengawal aspirasi mahasiswa serta kebijakan kampus yang adil dan transparan.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details-right">
                                <h3 class="mb-3">Misi</h3>
                                <ul class="content-list mt-2">
                                    <li><i class="fas fa-check-circle"></i> Menegakkan fungsi legislatif yang
                                        bertanggung jawab dan independen.</li>
                                    <li><i class="fas fa-check-circle"></i> Menyalurkan dan memperjuangkan aspirasi
                                        mahasiswa dengan sikap kritis dan konstruktif.</li>
                                    <li><i class="fas fa-check-circle"></i> Meningkatkan sinergi antara mahasiswa,
                                        ormawa, dan birokrasi kampus.</li>
                                    <li><i class="fas fa-check-circle"></i> Mengawasi pelaksanaan kegiatan ormawa sesuai
                                        pedoman administrasi.</li>
                                    <li><i class="fas fa-check-circle"></i> Mendorong terciptanya budaya organisasi yang
                                        transparan dan partisipatif.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    @endsection
