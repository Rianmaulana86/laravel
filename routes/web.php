<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\Blog;
use App\Http\Controllers\Login;
use App\Http\Controllers\Registrasi;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\SocialAccountController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Routing\RouteRegistrar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here' is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home', [
    	"title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
    	"title" => "About",
        "active" => "about",
     	"name" => "Rian Maulana",
    	"email" => "rian87334@gmail.com",
    	"image" => "rian.jpg"
    ]);
})->middleware('auth');;
Route::get('/blog', [Blog::class, 'index'])->middleware('auth');;
Route::get('/tod/{post:slug}',[Blog::class, 'tod' ])->middleware('auth');;
Route::get('categories', function() {
    return view('categories', [
        'title' => 'categories',
        'active' => 'categories',
        'categories' => Category::all()
        
    ]);

})->middleware('auth');
Route::get('/category/{category:slug}', function(Category $category){
    return view('blog', [
        'title' => "Post by Category : $category->name",
        'post' =>  $category->post->load('category', 'user'),

    ]);

})->middleware('auth');;
Route::get('/authors/{user:username}', function(User $user){
    return view('blog', [
        'title' => "Post by Author : $user->name",
        'post' => $user->post->load('category', 'user'),

    ]);    

})->middleware('auth');;
Route::post('/logout', [Login::class, 'logout']);
Route::get('/login', [Login::class, 'login'])->name('login')->middleware('guest');
Route::post('/log', [Login::class, 'log']);

Route::get('/register', [Registrasi::class, 'regist'])->middleware('guest');
Route::post('/create', [Registrasi::class, 'store']);

Route::get('/main', function()
{
    return view('dashboard/index');
}
)->middleware('auth');

Route::resource('/dashboard', Dashboard::class)->middleware('auth');

Route::controller(Dashboard::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware('auth');
    Route::get('/show/{post:slug}', 'show')->middleware('auth');
    Route::get('/create', function(){ return view('dashboard.posts.create', [ 'title' => 'Halaman Tambah Data', 'category' => Category::all()]); })->middleware('auth');
    Route::post('/make', 'store');
    Route::post('/delete/{post:slug}', 'destroy');
    Route::get('/edit/{post:slug}', 'edit')->middleware('auth');;
    Route::post('/update/{post:slug}', 'update');
    

});
Route::controller(Admin::class)->group(function() {
    Route::get('/admin', 'index')->middleware('admin');
    Route::get('/createcategory', 'create')->middleware('admin');
    Route::post('/store', 'store');
    Route::post('/editcategory/{category:slug}', 'update');
    Route::get('/updatecategory/{category:slug}', 'edit')->middleware('auth');
    Route::post('/deletecategory/{category:slug}', 'destroy');

});

Route::get('auth/{provider}', [SocialAccountController::class,  'redirectToProvider']);
Route::get('auth/{provider}/callback', [SocialAccountController::class,  'handleProviderCallback']);

