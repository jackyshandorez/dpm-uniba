@extends('auth.app-login')

@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                        <div class="card-header border-0">
                            <div class="text-center mb-1">
                                <img src="{{ asset('temp-admin') }}/app-assets/images/logo/logo.png" alt="Logo Aplikasi">
                            </div>
                            <div class="font-large-1 text-center">Ubah Kata Sandi</div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                <span>Silakan masukkan kata sandi baru Anda.</span>
                            </h6>
                        </div>

                        <div class="card-content">
                            <div class="card-body">

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.token.update') }}">
                                    @csrf

                                    <input type="hidden" name="email" value="{{ $email }}">

                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control round" placeholder="Kata Sandi Baru" required>
                                        <div class="form-control-position">
                                            <i class="ft-lock"></i>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password_confirmation" class="form-control round" placeholder="Konfirmasi Kata Sandi" required>
                                        <div class="form-control-position">
                                            <i class="ft-lock"></i>
                                        </div>
                                    </fieldset>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12">
                                            Simpan Kata Sandi Baru
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="card-footer border-0 p-0 text-center">
                            <p>Sudah ingat kata sandi? <a href="{{ route('login') }}" class="card-link">Masuk Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
