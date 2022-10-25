<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function create()
    {
        return view('register.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            //bisa nulis pakai tanda pipe "|" atau pakai array kaya dibawah ini
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            // 'departement_id' => 'required',
            'category_id' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        // //encripsi password, bisa pakay bcrypt atau hash
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        //pesan allert ketika sudah daftar
        $request->session()->flash('success', 'Registrasi Berhasil! Silakan Login!');

        //lanjut ke halaman login setelah register
        return redirect('/login');
    }
}
