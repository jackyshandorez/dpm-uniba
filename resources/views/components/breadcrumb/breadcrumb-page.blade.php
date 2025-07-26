@props(['title', 'title1' => null, 'href' => '#'])

<div class="site-breadcrumb" style="background: url({{ asset('temp-pages') }}/assets/img/breadcrumb/wisuda-uniba.jpeg)">
    <div class="container">
        <h2 class="breadcrumb-title">{{ $title ?? 'Judul Halaman' }}</h2>
        <ul class="breadcrumb-menu">
            <li><a href="/beranda">Home</a></li>
            @if ($title1)
                <li><a href="{{ $href }}">{{ $title1 }}</a></li>
            @endif

            <li class="active">{{ $title }}</li>
        </ul>
    </div>
</div>
