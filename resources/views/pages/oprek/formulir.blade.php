@extends('pages.layout.app')

@section('title', 'Formulir Pendaftaran')

@section('content')
    @include('components.sweet-alert.simpan-data')

    <!-- breadcrumb -->
    <x-breadcrumb.breadcrumb-page title="Open Rekruitment" />
    <!-- breadcrumb end -->

    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Formulir Pendaftaran Yang Tersedia</h2>

            @forelse($forms as $form)
                <div class="card mb-4 shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0" style="font-size: 2.2rem;">{{ $form->judul }}</h1>
                    </div>

                    <div class="card-body">
                        @if ($form->deskripsi)
                            <p>{{ $form->deskripsi }}</p>
                        @endif

                        <p>
                            <strong>Batas Akhir:</strong>
                            <span id="countdown-{{ $form->id }}"></span>
                        </p>

                        <div id="form-container-{{ $form->id }}">
                            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @if ($form->fields->count() > 6)
                                    <div class="row">
                                        @foreach ($form->fields as $field)
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ $field->label }}</label>
                                                @php
                                                    $isRequired = $field->required ? 'required' : '';
                                                @endphp

                                                @switch($field->type)
                                                    @case('text')
                                                    @case('number')

                                                    @case('email')
                                                    @case('date')
                                                        <input type="{{ $field->type }}" name="{{ $field->name }}"
                                                            class="form-control" {{ $isRequired }}>
                                                    @break

                                                    @case('textarea')
                                                        <textarea name="{{ $field->name }}" class="form-control" {{ $isRequired }}></textarea>
                                                    @break

                                                    @case('file')
                                                        <input type="file" name="{{ $field->name }}" class="form-control"
                                                            {{ $isRequired }}>
                                                    @break

                                                    @case('select')
                                                        <select name="{{ $field->name }}" class="form-control"
                                                            {{ $isRequired }}>
                                                            <option value="">Pilih...</option>
                                                        </select>
                                                    @break

                                                    @case('checkbox')
                                                        <div class="form-check">
                                                            <input type="checkbox" name="{{ $field->name }}"
                                                                class="form-check-input" id="{{ $field->name }}">
                                                            <label class="form-check-label"
                                                                for="{{ $field->name }}">{{ $field->label }}</label>
                                                        </div>
                                                    @break

                                                    @case('radio')
                                                        <div>
                                                            <label><input type="radio" name="{{ $field->name }}" value="ya"
                                                                    {{ $isRequired }}> Ya</label>
                                                            <label><input type="radio" name="{{ $field->name }}" value="tidak">
                                                                Tidak</label>
                                                        </div>
                                                    @break
                                                @endswitch
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    @foreach ($form->fields as $field)
                                        <div class="mb-3">
                                            <label class="form-label">{{ $field->label }}</label>
                                            @php
                                                $isRequired = $field->required ? 'required' : '';
                                            @endphp

                                            @switch($field->type)
                                                @case('text')
                                                @case('number')

                                                @case('email')
                                                @case('date')
                                                    <input type="{{ $field->type }}" name="{{ $field->name }}"
                                                        class="form-control" {{ $isRequired }}>
                                                @break

                                                @case('textarea')
                                                    <textarea name="{{ $field->name }}" class="form-control" {{ $isRequired }}></textarea>
                                                @break

                                                @case('file')
                                                    <input type="file" name="{{ $field->name }}" class="form-control"
                                                        {{ $isRequired }}>
                                                @break

                                                @case('select')
                                                    <select name="{{ $field->name }}" class="form-control" {{ $isRequired }}>
                                                        <option value="">Pilih...</option>
                                                    </select>
                                                @break

                                                @case('checkbox')
                                                    <div class="form-check">
                                                        <input type="checkbox" name="{{ $field->name }}" class="form-check-input"
                                                            id="{{ $field->name }}">
                                                        <label class="form-check-label"
                                                            for="{{ $field->name }}">{{ $field->label }}</label>
                                                    </div>
                                                @break

                                                @case('radio')
                                                    <div>
                                                        <label><input type="radio" name="{{ $field->name }}" value="ya"
                                                                {{ $isRequired }}> Ya</label>
                                                        <label><input type="radio" name="{{ $field->name }}" value="tidak">
                                                            Tidak</label>
                                                    </div>
                                                @break
                                            @endswitch
                                        </div>
                                    @endforeach
                                @endif

                                <input type="hidden" name="form_id" value="{{ $form->id }}">
                                <button type="submit" class="btn btn-primary">Kirim Pendaftaran</button>
                            </form>
                        </div>

                        <script>
                            (function() {
                                let countDownDate = new Date("{{ \Carbon\Carbon::parse($form->batas_akhir)->format('Y-m-d H:i:s') }}")
                                    .getTime();
                                let countdownEl = document.getElementById("countdown-{{ $form->id }}");
                                let formContainer = document.getElementById("form-container-{{ $form->id }}");

                                let x = setInterval(function() {
                                    let now = new Date().getTime();
                                    let distance = countDownDate - now;

                                    if (distance < 0) {
                                        clearInterval(x);
                                        countdownEl.innerHTML = "<span class='text-danger'>Pendaftaran sudah ditutup</span>";
                                        formContainer.innerHTML = "";
                                    } else {
                                        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                        countdownEl.innerHTML = days + " hari " +
                                            ("0" + hours).slice(-2) + ":" +
                                            ("0" + minutes).slice(-2) + ":" +
                                            ("0" + seconds).slice(-2);
                                    }
                                }, 1000);
                            })
                            ();
                        </script>

                    </div>
                </div>
                @empty
                    <div class="alert alert-warning">
                        Tidak ada form rekrutmen yang sedang dibuka saat ini.
                    </div>
            @endforelse
        </div>
    </section>
@endsection
