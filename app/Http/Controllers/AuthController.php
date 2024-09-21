<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\penduduk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function daftar() {
        return view('auth/daftar', [
            'title' => 'Daftar',
        ]);
    }
    public function forgot_password() {
        return view('auth/forgot_password', [
            'title' => 'lupa password',
        ]);
    }

    public function validasi_forgot_password(Request $request, $token)
{
    $getToken = PasswordResetToken::where('token', $token)->first();

    if (!$getToken) {
        return redirect()->route('login')->with('failed', 'Token tidak valid');
    }

    $title = 'Validasi Token'; // Sesuaikan judul sesuai kebutuhan Anda

    return view('auth.validasi-token', compact('token', 'title'));
}

    

    public function masuk() {
        return view('auth/masuk', [
            'title' => 'Masuk',
        ]);
    }

    public function forgot_password_act(Request $request)
    {
        $custummessage = [
            'email.required'=> 'email tidak boleh kosong',
            'email.email'=> 'email tidak valid',
            'email.exists'=> 'email tidak terdaftar',
        ];
    $request->validate([
        'email'=>'required|email|exists:users,email',
    ],$custummessage);

    $token = \Illuminate\Support\Str::random(60);

    PasswordResetToken::updateOrCreate(
        [
            'email'=> $request->email
        ],
        [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]
    );

    Mail::to($request->email)->send(new ResetPasswordMail($token));

    
    return redirect()->route('forgot-password')->with('success', 'kami telah mengirim email');

    }

    public function validasi_forgot_password_act(Request $request)
    {
        $custummessage = [
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.min' => 'Password Minimal 6 Karakter',
        ];
        $request->validate([
            'password'=>'required|min:6'
        ], $custummessage);
        $token = PasswordResetToken::where('token', $request->token)->first();
        if (!$token){
            return redirect()->route('login')->with('failed', 'token tidak valid');
        }
        $user = User::where('email', $token->email)->first();
        if (!$user){
            return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database');
        }
        $user->update([
            'password'=>Hash::make($request->password)
        ]);
        $token->delete();
        return redirect()->route('login')->with('failed', 'password berhasil di reset');
    }
    
   public function register(Request $request) {
    $validated = $request->validate([
        'username' => 'required|min:6|unique:users',
        'nama' => 'required',
        'email' => 'required',
        'telepon' => 'required|min:11',
        'password' => 'required|min:6',
        'konfirmasi' => 'required|same:password', // Validasi password konfirmasi harus sama dengan password
    ], [
        'konfirmasi.same' => 'Password konfirmasi harus sama dengan password.',
    ]);

    $validated['password'] = bcrypt($validated['password']);
    $validated['level'] = 'masyarakat';

    if(User::create($validated)) {
        return redirect('masuk')->with('berhasil', 'Berhasil mendaftarkan akun!');
    } else {
        return redirect()->back()->with('gagal', 'Gagal mendaftarkan akun!');
    }
}


    public function username() {
        return 'username';
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:6',
        ]);

        $data = $request->only(['username', 'password']);

        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/pengajuan-surat');
        }

        return back()->with('gagal', 'Gagal masuk!');
    }

    public function keluar(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('masuk');
    }

   
}
