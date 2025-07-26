@extends('admin.layout.app')
@section('title', 'Jurusan')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Tambah Jurusan')


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">@yield('breadcrumb2')</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">@yield('breadcrumb1')</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">@yield('title')</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb2')</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Data Kategori Berita</h4>
                                <a class="heading-elements-toggle"><i data-feather="more-vertical"
                                        class="font-medium-3"></i></a>
                                @include('components.ui.card')
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('kategori_berita.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama">Nama Kategori Berita</label>
                                            <input type="text" id="nama" name="nama" class="form-control"
                                                placeholder="Masukkan Nama Kategori Berita" value="{{ old('nama') }}"
                                                required>
                                        </div>

                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <a href="{{ route('kategori_berita.index') }}"
                                                class="btn btn-secondary">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
