<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    const PATH_VIEW = 'auth.';

    public function showRegister()
    {
        return view(self::PATH_VIEW . 'register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Đăng ký tài khoản thành công');
    }

    public function showLogin()
    {
        return view(self::PATH_VIEW . 'login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();

            Auth::login($user);

            $request->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('home')->with('success', 'Đăng nhập thành công');
            }
        }

        return back()->with('error', 'sai tài khoản hoặc mật khẩu');
    }
    public function logout()
    {

        if (Auth::user()->isAdmin()) {

            Auth::logout();

            request()->session()->invalidate();

            request()->session()->regenerateToken();

            return redirect()->route('auth.login.show')->with('success', 'Đăng xuất thành công');
        } else {

            Auth::logout();

            request()->session()->invalidate();

            request()->session()->regenerateToken();

            return redirect()->route('home')->with('success', 'Đăng xuất thành công');
        }
    }

    public function showForgot()
    {
        return view(self::PATH_VIEW . 'forgot');
    }

    public function forgot(ForgotRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email không tồn tại!']);
        }

        $token = Str::random(60);

        $user->reset_token = $token;

        $user->save();

        $data = [
            'email' => $user->email,
            'name' => $user->name,
            'token' => $user->reset_token
        ];

        Mail::send('mail.forgot', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Quên mật khẩu');
        });

        return back()->with('status', 'Check email của
         bạn để đổi mật khẩu');
    }

    public function passwordReset(string $token)
    {
        return view('auth.forgotPassword', compact('token'));
    }

    public function updatePassword(HttpRequest $request)
    {
        $user = User::where('reset_token', $request->reset_token)->first();

        $user->password = Hash::make($request->password);

        $user->reset_token = null;

        $user->save();

        return back()->with('success', 'Đổi mật khẩu thành công!');
    }
}
