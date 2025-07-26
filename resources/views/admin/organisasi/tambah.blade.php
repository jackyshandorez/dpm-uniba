@extends('admin.layout.app')
@section('title', 'Tambah Organisasi')
@section('breadcrumb1', 'Manajemen')

@section('content')
    @include('components.sweet-alert.simpan-data')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12">
                    <h3 class="content-header-title">Tambah Data Organisasi</h3>
                </div>
            </div>
            <div class="content-body">
                <section>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('organisasi.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama Organisasi</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}" required
                                        placeholder="Contoh: Himpunan Mahasiswa Prodi Informatika (HIMATIF)">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link">Link Website (Opsional)</label>
                                    <input type="url" name="link"
                                        class="form-control @error('link') is-invalid @enderror"
                                        value="{{ old('link') }}"
                                        placeholder="Contoh: https://himatif.uniba.ac.id">
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="logo">Logo (Opsional)</label>
                                    <input type="file" name="logo"
                                        class="form-control-file @error('logo') is-invalid @enderror">
                                    @error('logo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('organisasi.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
