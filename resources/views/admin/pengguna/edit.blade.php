@extends('admin.layout.app')
@section('title', 'Pengguna')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Edit Pengguna')

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
                                    @include('components.ui.card')
                                </div>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form form-horizontal"
                                    action="{{ route('pengguna.update', ['id' => $pengguna->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Nama</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nama"
                                                            class="form-control border-primary" placeholder="Nama Lengkap"
                                                            value="{{ $pengguna->nama }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Jabatan</label>
                                                    <div class="col-md-9">
                                                        <select name="jabatan_id" class="form-control border-primary"
                                                            required>
                                                            <option value="">-- Pilih Jabatan --</option>
                                                            @foreach ($jabatan as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $pengguna->jabatan_id == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->nama_jabatan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" name="email"
                                                            class="form-control border-primary" placeholder="Email"
                                                            value="{{ $pengguna->email }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Jurusan</label>
                                                    <div class="col-md-9">
                                                        <select name="jurusan_id" class="form-control border-primary"
                                                            required>
                                                            <option value="">-- Pilih Jurusan --</option>
                                                            @foreach ($jurusan as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $pengguna->jurusan_id == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Angkatan</label>
                                                    <div class="col-md-9">
                                                        <select name="angkatan" class="form-control border-primary"
                                                            required>
                                                            @for ($year = 2018; $year <= 2100; $year++)
                                                                <option value="{{ $year }}"
                                                                    {{ $pengguna->angkatan == $year ? 'selected' : '' }}>
                                                                    {{ $year }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Tanggal Lahir</label>
                                                    <div class="col-md-9">
                                                        <input type="date" name="tanggal_lahir"
                                                            class="form-control border-primary"
                                                            value="{{ $pengguna->tanggal_lahir }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Jenis Kelamin</label>
                                                    <div class="col-md-9">
                                                        <select name="jenis_kelamin" class="form-control border-primary"
                                                            required>
                                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                                            <option value="Laki-laki"
                                                                {{ $pengguna->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                                Laki-laki</option>
                                                            <option value="Perempuan"
                                                                {{ $pengguna->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">NPM</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nik"
                                                            class="form-control border-primary"
                                                            placeholder="Nomor Induk Kependudukan"
                                                            value="{{ $pengguna->nik }}">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Telepon</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="telepon"
                                                            class="form-control border-primary"
                                                            placeholder="Nomor Telepon" value="{{ $pengguna->telepon }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Alamat</label>
                                                    <div class="col-md-9">
                                                        <textarea name="alamat" class="form-control border-primary" rows="3" placeholder="Alamat Lengkap">{{ $pengguna->alamat }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Foto</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="foto"
                                                            class="form-control border-primary" accept="image/*">
                                                        <small class="text-muted">Format: jpeg, png, jpg, gif. Maksimal
                                                            5MB.</small>
                                                        @if ($pengguna->foto)
                                                            <div class="mt-2">
                                                                <img src="{{ asset('storage/' . $pengguna->foto) }}"
                                                                    alt="Foto Pengguna" width="100">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Status</label>
                                                    <div class="col-md-9">
                                                        <select name="status" class="form-control border-primary"
                                                            required>
                                                            <option value="aktif"
                                                                {{ $pengguna->status == 'aktif' ? 'selected' : '' }}>Aktif
                                                            </option>
                                                            <option value="nonaktif"
                                                                {{ $pengguna->status == 'nonaktif' ? 'selected' : '' }}>
                                                                Nonaktif</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <div class="form-actions center">
                                            <x-action.button href="{{ route('pengguna.index') }}">Batal</x-action.button>
                                            <x-action.button>Simpan</x-action.button>
                                        </div>
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
