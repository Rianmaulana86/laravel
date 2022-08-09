<?php

namespace App\Models;


class Post
{
    private static $blog_post =
    [
        [
            "title" => "Judul tulisan pertama",
            "slug" => "judul_tulisan_pertama",
            "no" => 1,

        ],
        [
            "title" => "Judul tulisan KEDUA",
            "slug" => "judul_tulisan_kedua",
            "no" => 2,
        ],
        ];

        public static function all()
        {
            return self::$blog_post;
        }
    public static function find($slug)
    {
        $posts = self::$blog_post;
        $post = [];
        foreach($posts as $p) {
            if($p['slug'] === $slug)
            {
                $post = $p;
            }
        }
        return $post;
    } 
    
}
?>
