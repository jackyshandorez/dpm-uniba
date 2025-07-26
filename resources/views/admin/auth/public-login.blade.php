<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Komentar Publik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="mb-3 text-center">Login untuk Berkomentar</h4>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if(!session()->has('otp_email'))
                            {{-- Form Kirim OTP --}}
                            <form method="POST" action="{{ url('/login-publik') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email kamu</label>
                                    <input type="email" name="email" id="email" class="form-control" required autofocus>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Kirim Kode OTP</button>
                            </form>
                        @else
                            {{-- Form Verifikasi OTP --}}
                            <form method="POST" action="{{ url('/verifikasi-otp') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="otp" class="form-label">Masukkan Kode OTP</label>
                                    <input type="text" name="otp" id="otp" class="form-control" required>
                                    <div class="form-text">OTP dikirim ke: <strong>{{ session('otp_email') }}</strong></div>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Verifikasi OTP</button>
                            </form>

                            {{-- Tombol Ganti Email --}}
                            <form method="POST" action="{{ url('/logout-publik') }}" class="mt-3 text-center">
                                @csrf
                                <button type="submit" class="btn btn-link text-danger">Ganti Email</button>
                            </form>
                        @endif

                        <div class="text-center mt-3">
                            <a href="{{ url('/berita') }}" class="text-decoration-none">← Kembali ke Beranda</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
