@extends('auth.app-login')
@section('title', 'Register')

@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 mt-5">

                            <div class="card-header border-0 text-center">
                                <img src="{{ asset('temp-admin/app-assets/images/logo/logo-dpm.png') }}" alt="Logo Aplikasi"
                                    style="width: 100px; height: auto;">
                                <h4 class="font-large-1 mt-1">Daftar Akun Baru</h4>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        {{-- Nama --}}
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" name="name"
                                                class="form-control round @error('name') is-invalid @enderror"
                                                placeholder="Nama Lengkap" value="{{ old('name') }}" autofocus>
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>

                                        {{-- Email --}}
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" name="email"
                                                class="form-control round @error('email') is-invalid @enderror"
                                                placeholder="Alamat Email" value="{{ old('email') }}">
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>

                                        {{-- Kata Sandi --}}
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password"
                                                class="form-control round @error('password') is-invalid @enderror"
                                                placeholder="Kata Sandi">
                                            <div class="form-control-position">
                                                <i class="ft-lock"></i>
                                            </div>
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </fieldset>

                                        {{-- Konfirmasi Kata Sandi --}}
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password_confirmation" class="form-control round"
                                                placeholder="Ulangi Kata Sandi">
                                            <div class="form-control-position">
                                                <i class="ft-lock"></i>
                                            </div>
                                        </fieldset>

                                        {{-- Tombol Daftar --}}
                                        <div class="form-group text-center">
                                            <button type="submit"
                                                class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue">
                                                Daftar
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1">
                                    Sudah punya akun?
                                    <a href="{{ route('login') }}" class="card-link">Masuk di sini</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
