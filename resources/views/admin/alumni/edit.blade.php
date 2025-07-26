@extends('admin.layout.app')
@section('title', 'Jurusan')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Edit Jurusan')


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
            <div class="row justify-content-md-center">
                <div class=" col-xl-6 col-lg-8 col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-card-center">Isi Data Jurusan</h4>
                            <a class="heading-elements-toggle"><i data-feather="more-vertical"
                                    class="font-medium-3"></i></a>
                            @include('components.ui.card')
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('alumni.update', $alumni->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-body">
                                        <!-- Nama Alumni -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="nama_alumni">Nama Alumni</label>
                                            <div class="col-md-9">
                                                <input type="text" id="nama_alumni"
                                                    class="form-control @error('nama_alumni') is-invalid @enderror"
                                                    name="nama_alumni"
                                                    value="{{ old('nama_alumni', $alumni->nama_alumni) }}">
                                                @error('nama_alumni')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Jabatan -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="jabatan_id">Jabatan</label>
                                            <div class="col-md-9">
                                                <select id="jabatan_id"
                                                    class="form-control @error('jabatan_id') is-invalid @enderror"
                                                    name="jabatan_id">
                                                    <option value="" disabled
                                                        {{ old('jabatan_id', $alumni->jabatan_id) ? '' : 'selected' }}>
                                                        -- Pilih Jabatan --
                                                    </option>
                                                    @foreach ($jabatans as $jabatan)
                                                        <option value="{{ $jabatan->id }}"
                                                            {{ old('jabatan_id', $alumni->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                                                            {{ $jabatan->nama_jabatan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('jabatan_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="jenis_kelamin">Jenis Kelamin</label>
                                            <div class="col-md-9">
                                                <select id="jenis_kelamin" name="jenis_kelamin"
                                                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-laki"
                                                        {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Periode -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="periode">Periode</label>
                                            <div class="col-md-9">
                                                <input type="text" id="periode"
                                                    class="form-control @error('periode') is-invalid @enderror"
                                                    name="periode" value="{{ old('periode', $alumni->periode) }}">
                                                @error('periode')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Foto -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="foto">Foto Alumni</label>
                                            <div class="col-md-9">
                                                <input type="file" id="foto"
                                                    class="form-control @error('foto') is-invalid @enderror" name="foto"
                                                    accept="image/*">
                                                <small class="text-muted">Format: jpg, jpeg, png. Maks: 2MB</small>
                                                @error('foto')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror

                                                @if ($alumni->foto)
                                                    <img src="{{ asset('storage/' . $alumni->foto) }}" alt="Foto Alumni"
                                                        class="img-thumbnail mt-2" width="150">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <x-action.button href="{{ route('alumni.index') }}">Batal</x-action.button>
                                        <x-action.button>Simpan</x-action.button>
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
