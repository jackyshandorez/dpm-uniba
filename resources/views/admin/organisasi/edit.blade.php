@extends('admin.layout.app')
@section('title', 'Edit Organisasi')
@section('breadcrumb1', 'Manajemen')

@section('content')
    @include('components.sweet-alert.simpan-data')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12">
                    <h3 class="content-header-title">Edit Data Organisasi</h3>
                </div>
            </div>
            <div class="content-body">
                <section>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('organisasi.update', $dataOrganisasi->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="nama">Nama dataOrganisasi</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                           value="{{ old('nama', $dataOrganisasi->nama) }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link">Link Website (Opsional)</label>
                                    <input type="url" name="link" class="form-control @error('link') is-invalid @enderror"
                                           value="{{ old('link', $dataOrganisasi->link) }}" placeholder="https://example.com">
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="logo">Logo (Opsional)</label>
                                    <input type="file" name="logo" class="form-control-file @error('logo') is-invalid @enderror">
                                    @error('logo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror

                                    @if($dataOrganisasi->logo)
                                        <p class="mt-2">Logo saat ini:</p>
                                        <img src="{{ asset('storage/' . $dataOrganisasi->logo) }}" alt="Logo Organisasi" width="80">
                                    @else
                                        <p class="mt-2 text-muted">Belum ada logo</p>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('organisasi.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
