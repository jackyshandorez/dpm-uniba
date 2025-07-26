<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="collapse navbar-collapse show" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item mobile-menu d-md-none mr-auto">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                data-feather="menu" class="font-large-1"></i></a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                data-feather="menu"></i></a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link-expand" href="#"><i data-feather="maximize"></i></a>
                    </li>
                    <li class="dropdown d-none d-md-block mr-1">
                        <a class="dropdown-toggle nav-link" id="apps-navbar-links" href="#"
                            data-toggle="dropdown">
                            Apps</a>
                        <div class="dropdown-menu">
                            <div class="arrow_box">
                                <a class="dropdown-item" href="email-application.html"><i data-feather="user"></i>
                                    Email</a><a class="dropdown-item" href="chat-application.html"><i
                                        data-feather="mail"></i> Chat</a><a class="dropdown-item"
                                    href="project-summary.html"><i data-feather="briefcase"></i> Project Summary
                                </a><a class="dropdown-item" href="full-calender.html"><i data-feather="calendar"></i>
                                    Calendar
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown navbar-search">
                        <a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i
                                data-feather="search"></i></a>
                        <ul class="dropdown-menu">
                            <li class="arrow_box">
                                <form>
                                    <div class="input-group search-box">
                                        <div class="position-relative has-icon-right full-width">
                                            <input class="form-control" id="search" type="text"
                                                placeholder="Search here..." />
                                            <div class="form-control-position navbar-search-close">
                                                <i data-feather="x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-id"></i><span
                                class="selected-language"></span></a>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i data-feather="bell" id="notification-navbar-link"></i>
                            @if ($jumlahNotif > 0)
                                <span
                                    class="badge badge-pill badge-sm badge-danger badge-up badge-glow">{{ $jumlahNotif }}</span>
                            @endif
                        </a>

                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Notifikasi Terbaru</span>
                                </h6>
                            </li>

                            <li class="scrollable-container media-list w-100">
                                @forelse ($notifikasiBaru as $notif)
                                    <a
                                        href="{{ route('notifikasi.baca', $notif->id) }}?redirect={{ urlencode($notif->link) }}">
                                        <div class="media {{ $notif->dibaca ? '' : 'bg-warning bg-lighten-4' }}">
                                            <div class="media-left align-self-center">
                                                <i data-feather="bell"
                                                    class="font-medium-4 text-{{ $notif->tipe }}"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-{{ $notif->tipe }}">
                                                    {{ $notif->judul }}
                                                </h6>
                                                @if ($notif->pesan)
                                                    <p class="notification-text font-small-3 text-muted">
                                                        {{ Str::limit($notif->pesan, 100) }}
                                                    </p>
                                                @endif
                                                <small>
                                                    <time class="media-meta text-muted">
                                                        {{ $notif->created_at->diffForHumans() }}
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="media text-center p-2">
                                        <p class="m-0 text-muted">Tidak ada notifikasi</p>
                                    </div>
                                @endforelse
                            </li>

                            <li class="dropdown-menu-footer">
                                <a class="dropdown-item text-right pr-1 text-primary"
                                    href="{{ route('notifikasi.baca-semua') }}">
                                    Tandai semua dibaca
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i data-feather="mail">
                            </i></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <div class="arrow_box_right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2">Messages</span>
                                    </h6>
                                </li>
                                <li class="scrollable-container media-list w-100">
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="avatar avatar-sm rounded-circle"><img
                                                        src="{{ asset('temp-admin') }}/app-assets/images/portrait/small/avatar-s-6.png"
                                                        alt="avatar" /></span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">
                                                    Sarah Montery<i
                                                        data-feather="circle font-small-2 success float-right"></i>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    Everything looks good. I will provide...
                                                </p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">3:55 PM</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="avatar avatar-sm rounded-circle"><span
                                                        class="media-object rounded-circle text-circle bg-warning">E</span></span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">
                                                    Eliza Elliot<i
                                                        data-feather="circle font-small-2 danger float-right"></i>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    Okay. here is some more details...
                                                </p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">2:10 AM</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="avatar avatar-sm rounded-circle"><img
                                                        src="{{ asset('temp-admin') }}/app-assets/images/portrait/small/avatar-s-3.png"
                                                        alt="avatar" /></span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">
                                                    Kelly Reyes<i
                                                        data-feather="circle font-small-2 warning float-right"></i>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    Check once and let me know if you...
                                                </p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Yesterday</time></small>
                                            </div>
                                        </div>
                                    </a><a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="avatar avatar-sm rounded-circle"><img
                                                        src="{{ asset('temp-admin') }}/app-assets/images/portrait/small/avatar-s-19.png"
                                                        alt="avatar" /></span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">
                                                    Tonny Deep<i
                                                        data-feather="circle font-small-2 danger float-right"></i>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    We will start new project development...
                                                </p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Friday</time></small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer">
                                    <a class="dropdown-item text-right info pr-1" href="javascript:void(0)">Read
                                        all</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="avatar avatar-online d-inline-block rounded-circle overflow-hidden"
                                style="width: 2.4rem; height: 2.4rem;">
                                @php
                                    $foto =
                                        Auth::user()->foto &&
                                        file_exists(public_path('storage/profil-admin/' . Auth::user()->foto))
                                            ? asset('storage/profil-admin/' . Auth::user()->foto)
                                            : asset('temp-admin/app-assets/images/portrait/small/avatar-s-1.png');
                                @endphp
                                <img src="{{ $foto }}" alt="avatar"
                                    style="width: 100%; height: 100%; object-fit: cover;" />
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right">
                                <a class="dropdown-item" href="#">
                                    <span class="d-inline-block align-middle mr-1 rounded-circle overflow-hidden"
                                        style="width: 2.4rem; height: 2.4rem;">
                                        <img src="{{ $foto }}" alt="avatar"
                                            style="width: 100%; height: 100%; object-fit: cover;" />
                                    </span>
                                    <span class="user-name text-bold-700 align-middle">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="/profile"><i data-feather="user"></i> Edit
                                    Profile</a>
                                <div class="dropdown-divider"></div>
                                {{-- Logout link yang memicu form --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="power"></i> Logout
                                </a>

                                {{-- Form logout tersembunyi --}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
