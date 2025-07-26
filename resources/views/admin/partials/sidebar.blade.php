<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true"
    data-img="{{ asset('temp-admin') }}/app-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img class="brand-logo" alt="Chameleon admin logo"
                        src="{{ asset('temp-admin') }}/app-assets/images/logo/logo-dpm.png" />
                    <h3 class="brand-text">DPM UNIBA</h3>
                </a>
            </li>
            <li class="nav-item d-md-none">
                <a class="nav-link close-navbar"><i data-feather="x"></i></a>
            </li>
        </ul>
    </div>
    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item">
                <a href="/dashboard"><i data-feather="home"></i><span class="menu-title">Dashboard</span></a>
            </li>



            <li class="nav-item">
                <a href="#"><i data-feather="users"></i><span class="menu-title">Manajemen</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('pengguna.index') }}">Pengguna</a></li>
                    <li><a class="menu-item" href="{{ route('alumni.index') }}">Alumni</a></li>
                    <li><a class="menu-item" href="/manajemen/data">Data</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#"><i data-feather="calendar"></i><span class="menu-title">Agenda & Panitia</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="/agenda">Daftar Agenda</a></li>
                    <li><a class="menu-item" href="{{ route('pendaftaran.index-terima') }}">Tugas Panitia</a></li>
                    <li><a class="menu-item" href="{{ route('devisi.index') }}">Kategori Devisi</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#"><i data-feather="file-text"></i><span class="menu-title">Surat</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="/laporan/dokumen">Dokumen</a></li>
                    <li><a class="menu-item" href="{{ route('surat.masuk.index') }}">Surat Masuk</a></li>
                    <li><a class="menu-item" href="{{ route('surat.keluar.index') }}">Surat Keluar</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#"><i data-feather="edit"></i><span class="menu-title">Berita</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="/daftar_berita">Daftar Berita</a></li>
                    <li><a class="menu-item" href="{{ route('kategori_berita.index') }}">Kategori Berita</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#"><i data-feather="user-check"></i><span class="menu-title">Rekrutmen</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('oprek.index') }}">Daftar Form</a></li>
                    <li><a class="menu-item" href="{{ route('pendaftaran.index') }}">Data Pendaftar</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#"><i data-feather="message-circle"></i><span class="menu-title">Aspirasi</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="/aspirasi">Data Aspirasi</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#"><i data-feather="settings"></i><span class="menu-title">Pengaturan</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('kontak.index') }}">Kontak</a></li>
                    <li><a class="menu-item" href="{{ route('admin.index') }}">Kelola Admin</a></li>
                    <li><a class="menu-item" href="{{ route('organisasi.index') }}">Logo Organisasi</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
