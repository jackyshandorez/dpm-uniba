<header class="header">
    <!-- header top -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrap">
                <div class="header-top-left">
                    <div class="header-top-social">
                        <span>Follow Us: </span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $kontak->link_instagram }}"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="https://wa.me/{{ $kontak->whatsapp }}" target="_blank"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="header-top-right">
                    <div class="header-top-contact">
                        <ul>
                            @if ($kontak)
                                <li>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($kontak->lokasi) }}"
                                        style="display: inline-block; max-width: 425px; white-space: normal;">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $kontak->lokasi ?? 'Lokasi belum diisi' }}
                                    </a>
                                </li>

                                <li>
                                    <a href="mailto:{{ $kontak->email }}"><i class="far fa-envelopes"></i> <span
                                            class="__cf_email__"
                                            data-cfemail="e58c8b838aa5809d8488958980cb868a88">{{ $kontak->email }}</span></a>
                                </li>
                                <li>
                                    <a href="https://wa.me/{{ $kontak->whatsapp }}" target="_blank">
                                        <i class="fab fa-whatsapp"></i> {{ $kontak->whatsapp }}
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
            <div class="container position-relative">
                <a class="navbar-brand" href="/beranda">
                    <img src="{{ asset('temp-admin') }}/app-assets/images/logo/logo-dpm.png" alt="logo"
                        style="width: 80px; ">

                </a>
                <div class="mobile-menu-right">
                    <div class="search-btn">
                        <button type="button" class="nav-right-link search-box-outer"><i
                                class="far fa-search"></i></button>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                    </button>
                </div>
                @include('pages.partials.sidebar')
            </div>
        </nav>
        </nav>
    </div>
</header>
