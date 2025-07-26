<div class="collapse navbar-collapse" id="main_nav">
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('beranda-page') }}">Beranda</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Profil</a>
            <ul class="dropdown-menu fade-down">
                <li><a class="dropdown-item" href="{{ route('tentang-page') }}">Tentang DPM</a></li>
                <li><a class="dropdown-item" href="{{ route('struktur-dpm-page') }}">Struktur Organisasi</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('berita-page') }}">Berita</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Anggota</a>
            <ul class="dropdown-menu fade-down">
                <li><a class="dropdown-item" href="{{ route('anggota-page') }}">Daftar Anggota</a></li>
                <li><a class="dropdown-item" href="{{ route('alumni-page') }}">Demisioner</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dokumen-page') }}">Dokumen</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('oprek-formulir') }}">Open Rekrutmen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('formulir-aspirasi-page') }}">Aspirasi Mahasiswa</a>
        </li>
        <div class="nav-right">
            <div class="search-btn">
                <button type="button" class="nav-right-link search-box-outer"><i class="far fa-search"></i></button>
            </div>
        </div>
    </ul>
</div>
