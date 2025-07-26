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
                            <div class="font-large-1 text-center">
                                Verifikasi Token
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                <span>Masukkan kode OTP yang telah dikirim ke email Anda.</span>
                            </h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                {{-- Notifikasi sukses --}}
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                {{-- Notifikasi error --}}
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                {{-- Form OTP --}}
                                <form method="POST" action="{{ route('password.token.verify') }}">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $email }}">

                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="text" name="token"
                                            class="form-control round @error('token') is-invalid @enderror"
                                            placeholder="Kode OTP" required autofocus maxlength="6">
                                        <div class="form-control-position">
                                            <i class="ft-shield"></i>
                                        </div>
                                        @error('token')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </fieldset>

                                    <div class="form-group text-center">
                                        <button type="submit"
                                            class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12">
                                            Verifikasi Token
                                        </button>
                                    </div>
                                </form>

                                {{-- Countdown dan Tombol Kirim Ulang --}}
                                <div class="text-center mt-2">
                                    @if(session('resent_limit'))
                                        <div class="alert alert-warning">
                                            Kirim ulang tersedia dalam <span id="countdown">60</span> detik.
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        <button type="submit" id="resendBtn" class="btn btn-link">Kirim Ulang Token</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer border-0 p-0">
                            <p class="float-sm-center text-center">
                                Belum menerima email? Periksa folder spam Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
@if(session('resent_limit') && session('resend_available_at'))
<script>
    const countdownEl = document.getElementById('countdown');
    const resendBtn = document.getElementById('resendBtn');

    // Waktu sekarang dan waktu target dari backend
    const now = Math.floor(Date.now() / 1000); // waktu saat ini dalam detik
    const target = {{ session('resend_available_at') }}; // waktu ketika tombol bisa diaktifkan

    let remaining = target - now;
    if (remaining < 0) remaining = 0;

    resendBtn.disabled = true;

    const interval = setInterval(() => {
        if (remaining <= 0) {
            resendBtn.disabled = false;
            countdownEl.parentElement.style.display = 'none';
            clearInterval(interval);
        } else {
            countdownEl.textContent = remaining;
            remaining--;
        }
    }, 1000);
</script>
@endif
@endsection

