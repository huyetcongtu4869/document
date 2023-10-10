<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('route_real_estate');
            } else {
                Session::flash('error', 'Sai mật khẩu hoặc email');
                return redirect()->route('login');
            }
        }
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function register(Request $request) {
        if ($request->isMethod('POST')) {
            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|'
            ]);
            $user = User::create(request(['name', 'email', 'password',]));
            auth()->login($user);
            return redirect()->route('route_real_estate');
        }
        return view('auth.register');
    }
}
