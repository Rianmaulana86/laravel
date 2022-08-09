<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Http\Controllers\Blog;
class Post extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $with = ['category', 'user'];

 

    public function scopeSearch($filter, array $searchs)
    {
    
    $filter->when($searchs['search'] ?? false, function($filter, $search) {
        return $filter->where('title', 'like', '%' . $search . '%')
                      ->orWhere('body', 'like', '%' . $search. '%');
    });
    $filter->when($searchs['category'] ?? false, function($filter, $category) {
        return $filter->whereHas('category', function($filter) use ($category) {
            $filter->where('slug', $category);
        });
    });
    $filter->when($searchs['user'] ?? false, function($filter, $user) {
        return $filter->whereHas('user', function($filter) use ($user) {
            $filter->where('username', $user);
        });
    });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
