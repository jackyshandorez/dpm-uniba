@extends('auth.app-login')
@section('title', 'Login')
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
                                <div class="font-large-1 mt-1">Masuk Admin</div>

                                {{-- Tambahan label role (hanya untuk tampilan) --}}
                                <div class="badge badge-info mt-1" style="font-size: 13px;">
                                    Login sebagai <strong>Admin / Superadmin</strong>
                                </div>
                            </div>



                            <div class="card-content">
                                <div class="card-body">

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" name="email"
                                                class="form-control round border-primary @error('email') is-invalid @enderror"
                                                placeholder="Alamat Email" value="{{ old('email') }}" autofocus>
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                            @error('email')
                                                <small class="invalid-feedback d-block mt-1">{{ $message }}</small>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" name="password"
                                                class="form-control round border-primary @error('password') is-invalid @enderror"
                                                placeholder="Kata Sandi">
                                            <div class="form-control-position">
                                                <i class="ft-lock"></i>
                                            </div>
                                            @error('password')
                                                <small class="invalid-feedback d-block mt-1">{{ $message }}</small>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-group position-relative has-icon-left">
                                            <select name="role"
                                                class="form-control round border-primary @error('role') is-invalid @enderror">
                                                <option value="">-- Pilih Role --</option>
                                                <option value="superadmin"
                                                    {{ old('role') == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                                </option>
                                            </select>
                                            <div class="form-control-position">
                                                <i class="ft-users"></i>
                                            </div>
                                            @error('role')
                                                <small class="invalid-feedback d-block mt-1">{{ $message }}</small>
                                            @enderror
                                        </fieldset>
                                        {{-- <fieldset class="form-group">
                                            <label for="role">Login Sebagai</label>
                                            <select name="role" class="form-control" required>
                                                <option value="">-- Pilih Role --</option>
                                                <option value="admin">Admin</option>
                                                <option value="superadmin">Super Admin</option>
                                            </select>
                                        </fieldset> --}}


                                        <div class="form-group row">
                                            <div class="col-md-6 col-12">
                                                <label class="ml-1">
                                                    <input type="checkbox" name="remember"> Ingat saya
                                                </label>
                                            </div>
                                            <div class="col-md-6 col-12 text-right">
                                                <a href="{{ route('password.token') }}" class="card-link">Lupa Kata
                                                    Sandi?</a>
                                            </div>

                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit"
                                                class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12">Masuk</button>
                                        </div>
                                    </form>
                                </div>

                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2">
                                    <span>Atau Masuk Dengan</span>
                                </p>
                                <div class="text-center mb-1">
                                    <a href="#" class="btn btn-social-icon round mr-1 btn-facebook"><i
                                            class="ft-facebook"></i></a>
                                    <a href="#" class="btn btn-social-icon round mr-1 btn-twitter"><i
                                            class="ft-twitter"></i></a>
                                    <a href="#" class="btn btn-social-icon round btn-instagram"><i
                                            class="ft-instagram"></i></a>
                                </div>

                                <p class="card-subtitle text-muted text-right font-small-3 mx-2 mb-">
                                    <span>Belum punya akun?
                                        <a href="{{ route('register') }}" class="card-link">Daftar Sekarang</a></span>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
