@extends('admin.layout.app')

@section('title', 'Tambah Berita')
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

            <form class="form" action="{{ url('/tambah_berita') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Kolom Penulisan -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title mb-0">Tulis Berita</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><strong>Judul Berita</strong></label>
                                    <input type="text" name="judul" class="form-control form-control-lg border-primary"
                                        placeholder="Judul berita menarik..." required>
                                </div>

                                <div class="form-group">
                                    <label><strong>Konten Berita</strong></label>
                                    <textarea name="konten" id="konten" class="form-control border-primary" rows="10"
                                        placeholder="Konten lengkap berita..." required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Pengaturan -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-warning text-white">
                                <h4 class="card-title mb-0">Pengaturan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kategori Berita</label>
                                    <select name="kategori_id" class="form-control border-primary" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategori as $kategori_berita)
                                            <option value="{{ $kategori_berita->id }}">{{ $kategori_berita->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Penulis</label>
                                    <input type="text" name="penulis" class="form-control border-primary"
                                        value="{{ old('penulis') }}" placeholder="Nama penulis berita..." required>
                                </div>


                                <div class="form-group">
                                    <label>Tanggal & Jam Publish</label>
                                    <input type="datetime-local" name="tanggal_publish" class="form-control border-primary">
                                </div>


                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control border-primary"
                                        onchange="previewImage(event)">
                                    <img id="preview" style="margin-top: 10px; max-width: 100%; display: none;" />
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control border-primary" required>
                                        <option value="Draft">Draft</option>
                                        <option value="Publish">Publish</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="card">
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
