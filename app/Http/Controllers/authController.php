<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class authController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function validateLogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('login', 'Selamat datang!');
        }

        return redirect()->back()->with('gagal', 'Login Gagal, periksa kembali email dan password anda');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

   
}
