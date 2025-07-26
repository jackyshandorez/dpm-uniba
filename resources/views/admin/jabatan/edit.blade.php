@extends('admin.layout.app')
@section('title', 'Jurusan')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Edit Jurusan')

@section('content')

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
                                <form class="form form-horizontal" action="/manajemen/jabatan/{{ $jabatan->id }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT') <!-- Method PUT untuk update -->

                                    <div class="form-body">
                                        <!-- Nama Jabatan -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="nama_jabatan">Nama Jabatan<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="nama_jabatan"
                                                    class="form-control @error('nama_jabatan') is-invalid @enderror"
                                                    name="nama_jabatan"
                                                    value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}">
                                                @error('nama_jabatan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Tanggung Jawab -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="tanggung_jawab">Tanggung
                                                Jawab<span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <textarea id="tanggung_jawab" class="form-control @error('tanggung_jawab') is-invalid @enderror" name="tanggung_jawab"
                                                    rows="4">{{ old('tanggung_jawab', $jabatan->tanggung_jawab) }}</textarea>
                                                @error('tanggung_jawab')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
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
