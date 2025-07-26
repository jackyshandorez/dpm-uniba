@extends('admin.layout.app')
@section('title', 'Edit Admin')
@section('breadcrumb1', 'Manajemen')

@section('content')
    @include('components.sweet-alert.simpan-data')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Edit Admin</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb1')</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section id="form-edit-admin">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Edit Admin</h4>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ old('name', $admin->name) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ old('email', $admin->email) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="L" {{ $admin->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="P" {{ $admin->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="superadmin" {{ $admin->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                                            </select>
                                        </div>

                                        <div class="mt-3">
                                            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @include('components.script.script')
@endsection
