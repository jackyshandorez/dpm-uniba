@extends('admin.layout.app')

@section('title', 'Edit Berita')
@section('breadcrumb1', 'Berita')
@section('breadcrumb2', 'Berita')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">@yield('title')</h3>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb1')</a></li>
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb2')</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="form" action="{{ url('/berita/' . $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row align-items-stretch">
                    <!-- Kolom Penulisan (kiri besar) -->
                    <div class="col-md-8 d-flex flex-column">
                        <div class="card h-100 d-flex flex-column">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title mb-0">Tulis Berita</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Judul Berita</strong></label>
                                    <input type="text" name="judul" class="form-control form-control-lg border-primary"
                                        placeholder="Judul berita menarik..." value="{{ old('judul', $berita->judul) }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label><strong>Konten Berita</strong></label>
                                    <textarea name="konten" id="konten" class="form-control border-primary" rows="10"
                                        placeholder="Konten lengkap berita..." required>{!! old('konten', $berita->konten) !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Pengaturan (kanan kecil) -->
                    <div class="col-md-4 d-flex flex-column">
                        <div class="card h-100 d-flex flex-column mb-3">
                            <div class="card-header bg-warning text-white">
                                <h4 class="card-title mb-0">Pengaturan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kategori Berita</label>
                                    <select name="kategori_id" class="form-control border-primary" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategori as $kategori_berita)
                                            <option value="{{ $kategori_berita->id }}"
                                                {{ old('kategori_id', $berita->kategori_id) == $kategori_berita->id ? 'selected' : '' }}>
                                                {{ $kategori_berita->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Penulis</label>
                                    <input type="text" name="penulis" class="form-control border-primary"
                                        value="{{ old('penulis', $berita->penulis) }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal & Jam Publish</label>
                                    <input type="datetime-local" name="tanggal_publish" class="form-control border-primary"
                                        value="{{ old('tanggal_publish', \Carbon\Carbon::parse($berita->tanggal_publish)->format('Y-m-d\TH:i')) }}">
                                </div>


                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control border-primary"
                                        onchange="previewImage(event)">
                                    @if ($berita->thumbnail)
                                        <img id="preview" src="{{ asset('storage/' . $berita->thumbnail) }}"
                                            style="margin-top: 10px; width: 160px; height: 120px; object-fit: cover; border-radius: 6px;" />
                                    @else
                                        <img id="preview"
                                            style="margin-top: 10px; width: 160px; height: 120px; object-fit: cover; border-radius: 6px; display: none;" />
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control border-primary" required>
                                        <option value="Draft"
                                            {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="Publish"
                                            {{ old('status', $berita->status) == 'Publish' ? 'selected' : '' }}>Publish
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="card mt-auto">
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-outline-secondary mr-2"
                                    onclick="window.history.back()">
                                    <i data-feather="arrow-left"></i> Kembali
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i data-feather="save"></i> Simpan Berita
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- CKEditor dan Preview Gambar -->
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('konten');

        function previewImage(event) {
            const img = document.getElementById('preview');
            img.src = URL.createObjectURL(event.target.files[0]);
            img.style.display = 'block';
        }
    </script>
@endsection
