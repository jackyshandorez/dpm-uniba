@extends('admin.layout.app')
@section('title', 'Detail Form Rekrutmen')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Detail Form Rekrutmen')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="col-md-6">
                    <h3 class="content-header-title">@yield('breadcrumb2')</h3>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Kolom Kiri -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Judul:</strong></label>
                                        <p>{{ $form->judul }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Status:</strong></label>
                                        <p>
                                            @if ($form->status == 'buka')
                                                <span class="badge badge-success">Buka</span>
                                            @else
                                                <span class="badge badge-danger">Tutup</span>
                                            @endif
                                        </p>
                                    </div>

                                    {{-- <div class="form-group">
                    <label><strong>Dibuat Oleh:</strong></label>
                    <p>{{ $form->creator->name ?? 'Admin' }}</p>
                </div> --}}
                                </div>

                                <!-- Kolom Kanan -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Deskripsi:</strong></label>
                                        <p>{{ $form->deskripsi }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Batas Akhir:</strong></label>
                                        <p>{{ \Carbon\Carbon::parse($form->batas_akhir)->translatedFormat('l, d F Y H:i') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="card-title">Field Input</h4>
                        </div>
                        <div class="card-body">
                            @if ($form->fields->count())
                                <div class="row">
                                    @foreach ($form->fields as $field)
                                        <div class="col-md-6 mb-3">
                                            <div class="border rounded p-2 h-100">
                                                <strong>{{ $field->label }}</strong>
                                                ({{ $field->type }})
                                                - {{ $field->required ? 'Wajib' : 'Opsional' }}<br>
                                                <small><i>Name: {{ $field->name }}</i></small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Tidak ada field input.</p>
                            @endif
                        </div>
                    </div>


                    <div class="mt-3">
                        <a href="{{ route('oprek.index') }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('oprek.edit', $form->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
