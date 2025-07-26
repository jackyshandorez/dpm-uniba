@extends('admin.layout.app')
@section('title', 'Detail Pengguna')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Pengguna')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Detail Pengguna</h3>
                </div>
            </div>
            <div class="content-body">
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Informasi Pengguna</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Nama:</strong> {{ $pengguna->nama }}</p>
                                            <p><strong>Email:</strong> {{ $pengguna->email }}</p>
                                            <p><strong>Jabatan:</strong>
                                                {{ $pengguna->jabatan ? $pengguna->jabatan->nama_jabatan : 'Tidak ada jabatan' }}
                                            </p>
                                            <p><strong>Jurusan:</strong>
                                                {{ $pengguna->jurusan ? $pengguna->jurusan->nama : 'Tidak ada jurusan' }}
                                            </p>
                                            <p><strong>Angkatan:</strong> {{ $pengguna->angkatan }}</p>
                                            <p><strong>Tanggal Lahir:</strong>
                                                {{ \Carbon\Carbon::parse($pengguna->tanggal_lahir)->format('d-m-Y') }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>NIK:</strong> {{ $pengguna->nik }}</p>
                                            <p><strong>Telepon:</strong> {{ $pengguna->telepon }}</p>
                                            <p><strong>Alamat:</strong> {{ $pengguna->alamat }}</p>
                                            <p><strong>Status:</strong> {{ ucfirst($pengguna->status) }}</p>
                                            <p><strong>Fakultas:</strong>
                                                {{ $pengguna->jurusan && $pengguna->jurusan->fakultas ? $pengguna->jurusan->fakultas->nama : 'Tidak ada fakultas' }}
                                            </p>
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $pengguna->foto) }}" alt="Foto Pengguna"
                                                    width="100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions d-flex justify-content-end">
                                        <x-action.button href="{{ route('pengguna.index') }}">Kembali</x-action.button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
