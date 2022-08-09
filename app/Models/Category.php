<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Blog;
class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
