<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(3)->create();
       Category::create([
        'name' => 'Web Programing',
        'slug' => 'Web-programing',
           
       ]);
       Category::create([
        'name' => 'Personal',
        'slug' => 'personal',
           
       ]);
       Category::create([
        'name' => 'Web Design',
        'slug' => 'web-design',
           
       ]);
       Post::factory(20)->create();
       

    }
    
}
