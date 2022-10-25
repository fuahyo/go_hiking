<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return User::all();
        return view('dashboard.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'users' => User::all(),
            
            'title' => 'Register',
            'active' => 'register',
            'departements' => Departement::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            //bisa nulis pakai tanda pipe "|" atau pakai array kaya dibawah ini
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'departement_id' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        // //encripsi password, bisa pakay bcrypt atau hash
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        //pesan allert ketika sudah daftar
        $request->session()->flash('success', 'Registrasi Berhasil!');

        //lanjut ke halaman login setelah register
        return redirect('/dashboard/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        // return 'hi';
        return view('dashboard.users.edit', [
            'users' => User::all(),
            'user' => $user,
            'title' => 'Register',
            'active' => 'register',
            'departements' => Departement::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules=[
            'name' => 'required|max:255',
            // 'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'departement_id' => 'required',
            // 'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ];
        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        };
        if($request->username != $user->username){
            $rules['username'] = 'required'|'min:3'|'max:255'|'unique:users';
        }
        // $validatedData['password'] = Hash::make($validatedData['password']);
        // $some_same_string = decrypt($password);
        // return ($some_same_string);
        $validatedData = $request->validate($rules);
        User::where('id', $user->id)->update($validatedData);

        //pesan allert ketika sudah daftar
        $request->session()->flash('success', 'Update data User Berhasil!');

        //lanjut ke halaman login setelah register
        return redirect('/dashboard/users');

        // if($request->slug != $category->slug){
        //     $rules['slug'] = 'required|unique:posts';
        // }

        // $validatedData = $request->validate($rules);

        // Category::where('id', $category->id)
        //         ->update($validatedData);

        // return redirect('/dashboard/categories')->with('success', 'Category has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User berhasil dihapus!');
    }
}
