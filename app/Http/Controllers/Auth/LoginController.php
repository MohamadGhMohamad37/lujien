<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $remember = $request->filled('remember');

    if (Auth::attempt($credentials, $remember)) {
        $request->session()->regenerate();

        // التوجيه بناءً على الدور
        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard', ['lang' => app()->getLocale()]);
        }

        // المستخدم العادي
        return redirect()->intended('/en' );
    }

    return back()->withErrors([
        'email' => 'Invalid login credentials.',
    ])->withInput();
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
