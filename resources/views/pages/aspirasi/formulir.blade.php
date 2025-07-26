@extends('pages.layout.app')
@section('title', 'Aspirasi')

@section('content')
    <!-- breadcrumb -->
    <x-breadcrumb.breadcrumb-page title="Aspirasi Mahasiswa" />
    <!-- breadcrumb end -->
    @include('components.sweet-alert.simpan-data')


    <!-- course-area -->
    <div class="application py-120">
        <div class="container">
            <div class="application-form">
                <h3>Formulir Aspirasi Mahasiswa</h3>
                <form action="{{ route('aspirasi.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <h5 class="mb-3">Informasi Mahasiswa</h5>

                        <!-- Nama -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- NIM -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                                    placeholder="Masukkan NIM" value="{{ old('nim') }}">
                                @error('nim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Jurusan -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select name="jurusan" class="form-select @error('jurusan') is-invalid @enderror">
                                    <option value="">-- Pilih Jurusan --</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->nama }}"
                                            {{ old('jurusan') == $item->nama ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Semester -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <select class="form-select @error('semester') is-invalid @enderror" name="semester">
                                    <option value="">Pilih Semester</option>
                                    @for ($i = 1; $i <= 14; $i++)
                                        <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                                            Semester {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                @error('semester')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <h5 class="mt-4 mb-3">Aspirasi Mahasiswa</h5>

                        <!-- Judul Aspirasi -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Kategori Aspirasi</label>
                                <select class="form-select @error('judul_aspirasi') is-invalid @enderror"
                                    name="judul_aspirasi">
                                    <option value="">Pilih Kategori Aspirasi</option>
                                    <option value="akademik" {{ old('judul_aspirasi') == 'akademik' ? 'selected' : '' }}>
                                        Akademik</option>
                                    <option value="fasilitas" {{ old('judul_aspirasi') == 'fasilitas' ? 'selected' : '' }}>
                                        Fasilitas Kampus</option>
                                    <option value="kegiatan" {{ old('judul_aspirasi') == 'kegiatan' ? 'selected' : '' }}>
                                        Kegiatan Mahasiswa</option>
                                    <option value="lainnya" {{ old('judul_aspirasi') == 'lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                                @error('judul_aspirasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Isi Aspirasi -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Isi Aspirasi</label>
                                <textarea class="form-control @error('isi_aspirasi') is-invalid @enderror" name="isi_aspirasi" rows="6"
                                    placeholder="Tuliskan Aspirasi Anda...">{{ old('isi_aspirasi') }}</textarea>
                                @error('isi_aspirasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Anonim -->
                        <div class="col-lg-12">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" id="anonim" name="anonim" value="1"
                                    {{ old('anonim') ? 'checked' : '' }}>
                                <label class="form-check-label" for="anonim">
                                    Kirim sebagai Anonim (Tanpa Nama)
                                </label>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="col-lg-12">
                            <button type="submit" class="theme-btn mt-4">
                                Kirim Aspirasi <i class="fas fa-arrow-right-long"></i>
                            </button>
                            <button type="reset" class="theme-btn theme-btn-outline mt-4">
                                Reset Formulir
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
