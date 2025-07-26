@extends('admin.layout.app')
@section('title', 'Pengguna')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Edit Pengguna')

@section('content')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">@yield('title')</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">@yield('breadcrumb1')</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb2')</a>
                                </li>
                                <li class="breadcrumb-item active">@yield('title')
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-colored-controls">Isi Data Dewan Perwakilan Mahasiswa
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i data-feather="more-vertical"
                                        class="font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i data-feather="minus"></i></a></li>
                                        <li><a data-action="reload"><i data-feather="rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i data-feather="maximize"></i></a></li>
                                        <li><a data-action="close"><i data-feather="x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Method PUT untuk melakukan update -->

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Judul</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="judul" class="form-control border-primary" value="{{ old('judul', $dokumen->judul) }}" placeholder="Judul Dokumen" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Deskripsi</label>
                                                    <div class="col-md-9">
                                                        <textarea name="deskripsi" class="form-control border-primary" rows="3" placeholder="Deskripsi Dokumen" required>{{ old('deskripsi', $dokumen->deskripsi) }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Penulis</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="penulis" class="form-control border-primary" value="{{ old('penulis', $dokumen->penulis) }}" placeholder="Penulis Dokumen" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Tanggal Terbit</label>
                                                    <div class="col-md-9">
                                                        <input type="date" name="tanggal_terbit" class="form-control border-primary" value="{{ old('tanggal_terbit', $dokumen->tanggal_terbit) }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Gambar</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="gambar" class="form-control border-primary" accept="image/*">
                                                        @if ($dokumen->gambar)
                                                            <img src="{{ asset('storage/' . $dokumen->gambar) }}" alt="Gambar Dokumen" class="img-thumbnail mt-2" style="width: 50px;"> <!-- Ukuran gambar lebih kecil -->
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">File</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="file" class="form-control border-primary">
                                                        @if ($dokumen->file)
                                                            <a href="{{ asset('storage/' . $dokumen->file) }}" class="mt-2" target="_blank">Lihat File</a>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Status</label>
                                                    <div class="col-md-9">
                                                        <select name="status" class="form-control border-primary" required>
                                                            <option value="draft" {{ $dokumen->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                                            <option value="publish" {{ $dokumen->status == 'publish' ? 'selected' : '' }}>Publish</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-danger mr-1" onclick="window.history.back()">
                                            <i data-feather="x"></i> Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i data-feather="check-square"></i> Simpan
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
