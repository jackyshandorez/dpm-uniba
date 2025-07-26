<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kode OTP Anda</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 30px;">
    <div style="max-width: 500px; margin: auto; background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #313eb4; text-align: center;">Kode OTP Anda</h2>
        <p>Halo,</p>
        <p>Kamu baru saja meminta kode OTP untuk login ke sistem komentar.</p>
        <p style="font-size: 16px;">Gunakan kode berikut untuk verifikasi:</p>

        <div style="text-align: center; margin: 20px 0;">
            <span style="font-size: 32px; font-weight: bold; color: #f39c12;">{{ $otp }}</span>
        </div>

        <p>Kode ini hanya berlaku selama <strong>5 menit</strong>.</p>
        <p>Jika kamu tidak meminta kode ini, abaikan email ini.</p>

        <br>
        <p>Salam,</p>
        <p><strong>DPM UNIBA</strong></p>
    </div>
</body>
</html>
