<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File as FacadesFile;

class Post
{
    public static function all()
    {
        $files = FacadesFile::files(resource_path("views/posts/")); 
        return array_map(
            function ($file) {
                    return $file->getContents();
            }, $files
        ); // array_map is sort of like a loop but it returns a new array. The second item is the thing you are looping over here $files.
    }
    public static function find($slug)
    {

        // $path = __DIR__ . "/../resources/views/posts/{$slug}.html";
        // $path = resource_path("posts/{$slug}.html");
        $path = resource_path("views/posts/{$slug}.html");
        //base_path(); // laravel helper to find path of base of the install
        //app_path();

        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }

        /**
         * Caching in laravel  
         */

        return cache()->remember("posts.{$slug}", 1200, function () use ($path) {
            return file_get_contents($path);
        }); // In timer you can use helper like now()->addMinutes(20);

    }
}
