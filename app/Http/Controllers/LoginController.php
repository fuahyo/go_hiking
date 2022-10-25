<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        //with('') = masuk ke flash message 
        return back()->with('loginError', 'Login Failed!');


        // User::create($validatedData);

        // //pesan allert ketika sudah daftar
        // $request->session()->flash('success', 'Registrasi Berhasil! Silakan Login!');

        // //lanjut ke halaman login setelah register
        // return redirect('/login');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
