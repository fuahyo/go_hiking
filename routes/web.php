<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Role;
use App\Models\Departement;
use App\Models\Classification;
use App\Models\Rootcause;
use App\Models\Status;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMyPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ChartController;

use App\Notifications\CapaNotification;
use App\Notifications\EmailNotification;

use Illuminate\Support\Facades\Notification;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// MAIL_MAILER=smtp
// MAIL_HOST=mailhog
// MAIL_PORT=1025
// MAIL_USERNAME=null
// MAIL_PASSWORD=null
// MAIL_ENCRYPTION=null

Route::get('/', function () {
    return view('Login/index', [
        "title" => "Login",
        "active" => "login"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);
// Route::resource('/register', RegisterController::class);


// Route::get('/dashboard', function(){
    //     return view('dashboard.index',);
    // })->middleware('auth');
    // Route::get('/dashboard/checkSlug', [DashboardController::class, 'checkSlug'])->middleware('auth');
    // Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
// Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Route::get('/send-notification',function(){
    
//     $users = Post::where('slug', auth()->post()->slug)->get();
//     foreach($users as $user){
    //        Notification::send($user, new EmailNotification()); 
    //     }
    //     return redirect()->back();
    // });
    
    Route::resource('/dashboard/mypost', DashboardMyPostController::class)->middleware('auth');
    Route::get('/dashboard/mypost/checkSlug', [DashboardMyPostController::class, 'checkSlug'])->middleware('auth');
    
    // Route::get('/dashboard/posts/checkSlug', [AdminPostController::class, 'checkSlug'])->middleware('auth');
    // Route::resource('/dashboard/posts', AdminPostController::class)->middleware('auth');
    // Route::get('/dashboard/posts/fetch-users/{id}',[AdminPostController::class,'fetchUsers']);
    // Route::get('/dashboard/posts/fetch-emails/{id}',[AdminPostController::class,'fetchEmails']);
    
    // Route::get('/dashboard/chart', [ChartController::class, 'index'])->middleware('IsAdmin');
    
    // Route::resource('/dashboard/users', AdminUserController::class)->middleware('IsAdmin');
    
Route::group(['middleware' => ['auth', 'CheckRole:3']], function(){
    Route::resource('/dashboard/users', AdminUserController::class);
    Route::get('/dashboard/chart', [ChartController::class, 'index']);
    Route::get('/dashboard/posts/checkSlug', [AdminPostController::class, 'checkSlug']);
    Route::resource('/dashboard/posts', AdminPostController::class)->middleware('auth');
    Route::get('/dashboard/posts/fetch-users/{id}',[AdminPostController::class,'fetchUsers']);
    Route::get('/dashboard/posts/fetch-emails/{id}',[AdminPostController::class,'fetchEmails']);
});

// Route::get('/dashboard/products', TestController::class, 'index');
// Route::get('/findPrice','AdminPostController@findPrice');


//gadipake lagi karena udah ditangani oleh query kita di model
// //halaman kategory
// // Route::get('/categories/{categories:slug}', [PostController::class, 'show']);
// Route::get('/categories/{category:slug}', function(Category $category){
//     return view ('posts', [
//         'title' => "Post By Category: $category->name" ,
//         'active' => 'categories',
//         //load()-> = untuk mengatasi permasalahan N+1 di childnyajadi querynya lebih dikit, jadi sistem lebih cepat
//         'posts' => $category->posts->load('category', 'author'),
        
//     ]);
    
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view ('posts', [
//         'title' => "Post By Author: $author->name",
//         'active' => 'posts',
//         //load()-> = untuk mengatasi permasalahan N+1 di childnyajadi querynya lebih dikit, jadi sistem lebih cepat
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });

