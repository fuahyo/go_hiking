<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\User; 
use App\Models\Category; 
use App\Models\Departement;
use App\Models\Classification;
use App\Models\Rootcause;
use App\Models\Status;

class PostController extends Controller
{
    public function index(){
        //dd = untuk memeriksa permintaan search (dari name="search" form pencarian)   
        //dd(request('search'));

        //$posts = variable baru bernama post yang akan berisi query ke database
        //Post::latest() = cari data didalam post lalu urutkan berdasarkan yang paling baru
        // $posts = Post::latest();

        // //kalau ada sesuatu yang ditulis di kolom pencarian, tambahkan query ke $post 
        // if(request('search')){
        //     //'%' digunakan untuk mencari apapun yang ada di depannya atau apapun yg dibelakangnya
        //     $posts->where('title', 'like', '%'.request('search'). '%')
        //         ->orWhere('body', 'like', '%'.request('search'). '%');

        // }

        $title = '';
        if(request('departement')){
            $departement = Departement::firstWhere('slug', request('departement'));
            $title = ' in '. $departement->name;
        }
        if(request('classification')){
            $classification = Classification::firstWhere('slug', request('classification'));
            $title = ' in '. $classification->name;
        }
        if(request('rootcause')){
            $rootcause = Rootcause::firstWhere('slug', request('rootcause'));
            $title = ' in '. $rootcause->name;
        }
        if(request('status')){
            $status = Status::firstWhere('slug', request('status'));
            $title = ' in '. $status->name;
        }
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' in '. $author->name;
        }

        return view('posts', [
            "title" => "All Post".$title,
            "active" => "posts",
            "posts" => Post::latest()->filter(request(['search', 'departement', 'author']))->paginate(7)->withQueryString()
            
            //Post::all() = urut berdasarkan id
            // "posts" => Post::all()
            
            //Post::all() = urut berdasarkan waktu terakhir diupdate
            //with()-> = untuk mengatasi permasalahan N+1 jadi querynya lebih dikit, jadi sistem lebih cepat
        ]);
    }
    
    public function show(Post $post){
        return view('post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
