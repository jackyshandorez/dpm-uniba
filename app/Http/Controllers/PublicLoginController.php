<?php

namespace App\Http\Controllers;
use App\Models\PublicUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\OtpMailKomentar;

class PublicLoginController extends Controller
{
    public function form() {
        return view('admin.auth.public-login');
    }

    public function sendOtp(Request $request) {
        $request->validate(['email' => 'required|email']);

        $otp = random_int(100000, 999999);
        $user = PublicUser::updateOrCreate(
            ['email' => $request->email],
            [
                'otp_code' => $otp,
                'otp_expires_at' => now()->addMinutes(5),
            ]
        );

        Mail::to($user->email)->send(new OtpMailKomentar($otp));

        Session::put('otp_email', $user->email);

        return back()->with('success', 'OTP dikirim ke email.');
    }

    public function verifyOtp(Request $request) {
        $request->validate(['otp' => 'required']);

        $user = PublicUser::where('email', Session::get('otp_email'))->first();
        if (!$user || $user->otp_code !== $request->otp || $user->otp_expires_at < now()) {
            return back()->with('error', 'OTP tidak valid atau kadaluarsa.');
        }

        Session::put('public_user_id', $user->id);
        return redirect()->back()->with('success', 'Berhasil login sebagai publik, Anda bisa berkomentar');
    }

    public function logout()
    {
        Session::forget('public_user_id');
        Session::forget('otp_email');
        return redirect('/login-publik')->with('success', 'Berhasil logout.');
    }
}
