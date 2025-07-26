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
                            <div class="heading-elements">
                                @include('components.ui.card')
                            </div>
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('jurusan.update', $jurusan->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT') <!-- Method PUT untuk update -->

                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="kode">Kode Jurusan</label>
                                            <div class="col-md-9">
                                                <input type="text" id="kode" class="form-control" name="kode"
                                                    value="{{ $jurusan->kode }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="nama">Nama Jurusan</label>
                                            <div class="col-md-9">
                                                <input type="text" id="nama" class="form-control" name="nama"
                                                    value="{{ old('nama', $jurusan->nama) }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="fakultas">Fakultas</label>
                                            <div class="col-md-9">
                                                <select name="fakultas_id" class="form-control" required>
                                                    <option value="">-- Pilih Fakultas --</option>
                                                    @foreach ($fakultas as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $jurusan->fakultas_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-danger mr-1" onclick="window.history.back()">
                                            <i data-feather="x"></i> Batal
                                        </button>
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
