<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class Blog extends Controller
{
    

    public function index()
    {

        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if(request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = ' by ' . $user->username;
        }



        return view('blog', [
            "title" => "All Post" . $title,
            "active" => 'blog',
            "post" => Post::latest()->search(request(['search', 'category', 'user']))->paginate(7)->withQueryString()
        ]);  
    }
    public function tod(Post $post)
    {
        return view('tod', [
            "title" => "Tod",
            "tod" => $post
    
        ]);
    }
}
