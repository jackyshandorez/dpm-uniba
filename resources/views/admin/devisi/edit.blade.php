@extends('admin.layout.app')
@section('title', 'Devisi')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Edit Devisi')

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
                            <li class="breadcrumb-item"><a href="#">@yield('breadcrumb1')</a></li>
                            <li class="breadcrumb-item"><a href="#">@yield('breadcrumb2')</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form">Form @yield('breadcrumb2')</h4>
                        @include('components.ui.card')
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" action="{{ route('devisi.update', $devisi->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="nama">Nama Devisi</label>
                                        <input type="text" id="nama" name="nama" class="form-control border-primary"
                                            value="{{ old('nama', $devisi->nama) }}" placeholder="Contoh: Ketua Humas" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="warna">Warna (opsional)</label>
                                        <input type="color" id="warna" name="warna" class="form-control border-primary"
                                            value="{{ old('warna', $devisi->warna ?? '#1e90ff') }}">
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
