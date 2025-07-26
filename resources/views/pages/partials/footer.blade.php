<footer class="footer-area">
    <div class="footer-shape">
        <img src="{{ asset('temp-admin') }}/app-assets/images/logo/logo-dpm.png" alt="logo">
    </div>
    <div class="footer-widget">
        <div class="container">
            <div class="row footer-widget-wrapper pt-100 pb-80">

                {{-- Kolom 1: Tentang DPM + Kontak --}}
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget-box about-us">
                        <div class="d-flex align-items-center mb-2">
                            <a href="#" class="footer-logo me-2">
                                <img src="{{ asset('temp-admin') }}/app-assets/images/logo/logo-dpm.png"
                                    style="width: 60px; height: auto;" alt="Logo DPM">
                            </a>
                            <div class="footer-text" style="position: relative; top: -9px;">
                                <h6 class="mb-0" style="font-size: 14px; color: #fff;">
                                    Dewan Perwakilan Mahasiswa<br>
                                    Universitas KH. Bahaudin Mudhary Madura
                                </h6>
                            </div>
                        </div>
                        <ul class="footer-contact">
                            @if ($kontak)
                                <li>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($kontak->lokasi) }}"
                                        style="display: inline-block; max-width: 425px; white-space: normal;">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $kontak->lokasi ?? 'Lokasi belum diisi' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:{{ $kontak->email }}">
                                        <i class="far fa-envelope"></i> {{ $kontak->email }}
                                    </a>
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

                {{-- Kolom 2 & 3: Organisasi Kampus UNIBA --}}
                <div class="col-md-12 col-lg-8">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Organisasi Kampus Universitas KH. Bahaudin Mudhary Madura</h4>
                        <div class="row">
                            @php
                                // Urutkan berdasarkan ID sebelum dipecah menjadi 2 bagian
                                $sortedOrganisasi = $organisasi->sortBy('id');
                                $chunks = $sortedOrganisasi->chunk(ceil($sortedOrganisasi->count() / 2));
                            @endphp
                            @foreach ($chunks as $chunk)
                                <div class="col-md-6">
                                    <ul class="footer-list">
                                        @foreach ($chunk as $org)
                                            <li style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <a href="{{ $org->link ?? '#' }}" target="_blank"
                                                    rel="noopener noreferrer">
                                                    <i class="fas fa-caret-right"></i> {{ $org->nama }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="copyright">
        <div class="container">
            <div class="copyright-wrapper">
                <div class="row">
                    <div class="col-md-9 align-self-center">
                        <p class="copyright-text">
                            &copy; <span id="date"></span> Dewan Perwakilan Mahasiswa UNIBA Madura
                            <span>by <a href="" target="_blank"
                                    style="color: #ffc107; text-decoration: none;">jack</a></span>.
                            Hak Cipta Dilindungi.
                        </p>

                    </div>
                    <div class="col-md-3 align-self-center">
                        <ul class="footer-social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $kontak->link_instagram }}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://wa.me/{{ $kontak->whatsapp }}" target="_blank"><i
                                        class="fab fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
