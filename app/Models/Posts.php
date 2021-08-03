<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title    = $title;
        $this->excerpt  = $excerpt;
        $this->date     = $date;
        $this->body     = $body;
        $this->slug     = $slug;
    }

    public static function all()
    {
        return Cache::rememberForever('posts.all', function () {
            $files = FacadesFile::files(resource_path("views/posts"));

            // collect an array an wrap them with in collection
            return collect($files)->map(function ($file) {


                return YamlFrontMatter::parseFile($file);
            })
                ->map(function ($document) {
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })
                //->sortBy('date') // sort by Asc
                ->sortByDesc('date') // sort by desc
            ;
        });


        // $files = FacadesFile::files(resource_path("views/posts/")); 
        // return array_map(
        //     function ($file) {
        //             return $file->getContents();
        //     }, $files
        // ); // array_map is sort of like a loop but it returns a new array. The second item is the thing you are looping over here $files.
    }

    public static function find($slug)
    {

 

        $posts = static::all()->firstWhere('slug', $slug);

        return $posts;

        // $path = __DIR__ . "/../resources/views/posts/{$slug}.html";
        // $path = resource_path("posts/{$slug}.html");

        // $path = resource_path("views/posts/{$slug}.html");

        //base_path(); // laravel helper to find path of base of the install
        //app_path();

        // if (!file_exists($path)) {
        //     throw new ModelNotFoundException();
        // }

        /**
         * Caching in laravel  
         */

        // return cache()->remember("posts.{$slug}", 1200, function () use ($path) {
        //     return file_get_contents($path);
        // }); // In timer you can use helper like now()->addMinutes(20);

    }

    public static function findOrFail($slug)
    {
        $posts = static::find($slug);

        if(! $posts) {
            throw new ModelNotFoundException();
        }

        return $posts;
    }
}
