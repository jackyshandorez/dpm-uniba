@extends('auth.app-login')
@section('content')
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row"></div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0">
                                <div class="text-center mb-1">
                                    <img src="{{ asset('temp-admin') }}/app-assets/images/logo/logo.png"
                                        alt="Logo Aplikasi">
                                </div>
                                <div class="font-large-1 text-center">
                                    Pemulihan Kata Sandi
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Kami akan mengirimkan token untuk mereset kata sandi Anda.</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <!-- Status Sesi -->
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" id="email" name="email"
                                                value="{{ old('email') }}"
                                                class="form-control round @error('email') is-invalid @enderror"
                                                placeholder="Alamat Email Anda"  autofocus>
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>

                                            @error('email')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>

                                        <div class="form-group text-center">
                                            <button type="submit"
                                                class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">
                                                {{ __('Kirim Token') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer border-0 p-0">
                                <p class="float-sm-center text-center">Belum punya akun?
                                    <a href="{{ route('register') }}" class="card-link">Daftar Sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
