<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('welcome');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|',
            'password' => 'required|string|min:6',
        ]);

        $cekuser = kasir::where('username', $request->username)->first();
        if ($cekuser == null) {
            return redirect()->back()->with('error', 'User Tidak Ditemukan');
        }

        if (FacadesAuth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (FacadesAuth::user()->id_level == 3) {
               return redirect()->intended('/customer/dashboard');
            }
            return redirect()->intended('/admin/layout');
        } else {
            return back()->withErrors(['username' => 'Username atau password salah']);
        }
    }

    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|',
        ]);

        $user = new kasir();
        $user->nama_lengkap = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->id_level = 3;
        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        FacadesAuth::logout();
        return redirect('/');
        // return redirect()->route('login')->with('success', 'Logout Berhasil');
    }

}
