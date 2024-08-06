<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('user.pages.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    $user = User::where('email', $credentials['email'])->first();

    if ($user && !$user->hasVerifiedEmail()) {
        return redirect()->back()->withErrors([
            'email' => 'Xác nhận email của bạn trước khi đăng nhập.',
        ]);
    }

    if (Auth::attempt($credentials)) {
        return redirect()->intended('home');
    }

    return redirect()->back()->withErrors([
        'email' => 'Email hoặc mật khẩu không chính xác.',
    ]);
}


    public function logout()
    {
        Auth::logout();
        return redirect('home');
    }

    public function showRegisterForm()
    {
        return view('user.pages.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:1|confirmed',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->email_verified_at = null; 
    $user->save();

    Mail::to($user->email)->send(new VerifyEmail($user));

    return redirect()->route('login')->with('success', 'Đăng ký thành công! Kiểm tra email để xác nhận.');
}

public function verify($id)
{
    $user = User::findOrFail($id);
    $user->email_verified_at = now();
    $user->save();

    return redirect()->route('login')->with('success', 'Xác nhận email thành công!');
}

}
