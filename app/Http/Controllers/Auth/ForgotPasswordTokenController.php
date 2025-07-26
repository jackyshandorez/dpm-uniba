<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class ForgotPasswordTokenController extends Controller
{
    // 1. Tampilkan form input email
    public function showEmailForm()
    {
        return view('auth.forgot-password-email');
    }

    // 2. Proses kirim token
    public function sendToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'Email tidak ditemukan dalam sistem.'
        ]);

        $email = $request->email;
        $token = rand(100000, 999999);

        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        if ($record) {
            $lastResend = Carbon::parse($record->last_resend_at);
            $diffSeconds = now()->diffInSeconds($lastResend);

            if ($record->resend_count >= 3 && $diffSeconds < 60) {
                return back()->with([
                    'error' => 'Anda sudah mengirim ulang token 3 kali. Silakan tunggu ' . (60 - $diffSeconds) . ' detik.',
                    'resent_limit' => true,
                    'resend_available_at' => now()->addSeconds(60 - $diffSeconds)->timestamp,
                ]);
            }

            // Jika lewat 60 detik, reset ulang resend_count
            $resendCount = $diffSeconds >= 60 ? 1 : $record->resend_count + 1;

            // Update record yang lama
            DB::table('password_reset_tokens')->where('email', $email)->update([
                'token' => Hash::make($token),
                'created_at' => now(),
                'resend_count' => $resendCount,
                'last_resend_at' => now()
            ]);
        } else {
            // Belum ada, insert baru
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => Hash::make($token),
                'created_at' => now(),
                'resend_count' => 1,
                'last_resend_at' => now()
            ]);
        }

        // Kirim token via email
        Mail::send('auth.otp', ['token' => $token], function ($message) use ($email) {
            $message->to($email)->subject('Kode OTP Reset Password');
        });

        return redirect()->route('password.token.verify.form', ['email' => base64_encode($email)])
            ->with('success', 'Kode token telah dikirim ke email Anda.');
    }


    // 3. Tampilkan form verifikasi token
    public function showTokenForm($email)
    {
        $email = base64_decode($email);

        $isValid = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('created_at', '>', Carbon::now()->subMinutes(10))
            ->exists();

        if (!$isValid) {
            return redirect()->route('password.request')
                ->with('error', 'Token tidak valid atau sudah kadaluarsa.');
        }

        return view('auth.verify-token', compact('email'));
    }

    // 4. Verifikasi token
    public function verifyToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|numeric|digits:6'
        ]);

        $email = $request->email;
        $token = $request->token;

        $record = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('created_at', '>', Carbon::now()->subMinutes(10))
            ->first();

        if (!$record || !Hash::check($token, $record->token)) {
            return back()->with('error', 'Token salah atau sudah kadaluarsa.');
        }

        return redirect()->route('password.token.reset', [
            'email' => base64_encode($email),
            'token' => base64_encode($token)
        ])->with('success', 'Token valid. Silakan ubah password Anda.');
    }

    // 5. Tampilkan form reset password
    public function showResetForm($email, $token)
    {
        $email = base64_decode($email);
        $token = base64_decode($token);

        $record = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('created_at', '>', Carbon::now()->subMinutes(10))
            ->first();

        if (!$record || !Hash::check($token, $record->token)) {
            return redirect()->route('password.request')
                ->with('error', 'Token tidak valid.');
        }

        return view('auth.reset-password-token', compact('email'));
    }

    // 6. Proses simpan password baru
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $email = $request->email;

        $record = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->where('created_at', '>', Carbon::now()->subMinutes(10))
            ->first();

        if (!$record) {
            return redirect()->route('password.request')
                ->with('error', 'Token sudah tidak berlaku.');
        }

        // Simpan password baru
        User::where('email', $email)->update([
            'password' => Hash::make($request->password)
        ]);

        // Hapus token
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return redirect()->route('login')->with('success', 'Password berhasil diubah.');
    }
}
