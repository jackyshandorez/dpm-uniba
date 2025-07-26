@extends('admin.layout.app')
@section('title', 'Profil')
@section('breadcrumb1', 'Profil Saya')
@section('table', 'tablePengguna')

@section('content')
    @include('components.sweet-alert.simpan-data')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row"></div>
            <div class="content-body">
                <section id="user-profile">
                    <div class="row">

                        <div class="col-md-12">
                            <!-- Form Update Profil -->
                            <div class="card">
                                <div class="card-body text-center">
                                    @php
                                        $foto =
                                            Auth::user()->foto &&
                                            file_exists(public_path('storage/profil-admin/' . Auth::user()->foto))
                                                ? asset('storage/profil-admin/' . Auth::user()->foto)
                                                : asset('temp-admin/app-assets/images/portrait/small/avatar-s-1.png');
                                    @endphp
                                    <img src="{{ $foto }}" class="rounded-circle mb-2" width="120" height="120"
                                        style="object-fit: cover;" alt="Foto Profil">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profil</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')

                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', Auth::user()->name) }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', Auth::user()->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" id="laki" value="L"
                                                    {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="laki">Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" id="perempuan" value="P"
                                                    {{ old('jenis_kelamin', Auth::user()->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="perempuan">Perempuan</label>
                                            </div>
                                            @error('jenis_kelamin')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="foto">Foto Profil</label>
                                            <input type="file" name="foto" id="foto"
                                                class="form-control-file @error('foto') is-invalid @enderror">
                                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti
                                                foto.</small>
                                            @error('foto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </form>

                                </div>
                            </div>


                            <!-- Form Ubah Password -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ganti Password</h4>
                                </div>
                                <div class="card-body">
                                    {{-- Notifikasi sukses --}}
                                    @if (session('status') === 'password-updated')
                                        <div class="alert alert-success">
                                            Password berhasil diperbarui.
                                        </div>
                                    @endif

                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="current_password">Password Lama</label>
                                            <input type="password" name="current_password"
                                                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror">
                                            @error('current_password', 'updatePassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password Baru</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password', 'updatePassword') is-invalid @enderror">
                                            @error('password', 'updatePassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                                            <input type="password" name="password_confirmation"
                                                class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror">
                                            @error('password_confirmation', 'updatePassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-warning">Ubah Password</button>
                                    </form>

                                </div>
                            </div>



                            <!-- Form Hapus Akun -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-danger">Hapus Akun</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('profile.destroy') }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun? Ini tidak bisa dikembalikan.')">
                                        @csrf
                                        @method('DELETE')

                                        <div class="form-group">
                                            <label for="password">Masukkan Password untuk Konfirmasi</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password', 'userDeletion') is-invalid @enderror">
                                            @error('password', 'userDeletion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-danger">Hapus Akun</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
