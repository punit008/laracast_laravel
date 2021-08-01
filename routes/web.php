<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome'); // Renders the php file that is present in the resources -> view (folder) -> welcome.blade.php
    // return "hello world"; // pass the string to the page
    // return ['foo' => 'bar']; // can pass the json to the page
});

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/post/{post}', function ($slug) {

    $path = __DIR__ . "/../resources/views/posts/{$slug}.html";

    if( !file_exists($path) ) {
        return redirect('/posts');
        ddd('file does not exits');
    }

    /**
     * Caching in laravel  
     */ 

     $post = cache()->remember("posts.{$slug}", 1200, function () use ($path) {
         var_dump($path);
        return  file_get_contents($path);
     }); // In timer you can use helper like now()->addMinutes(20);

    return view('post', [
        'post' =>  $post 
    ]);

    // return view('post');
})
//->where('post', '[A-z]+') // Find one or more upper or lowercase letter and nothing else
->where('post', '[A-z_\-]+') // Find one or more upper or lowercase letter including - in url and nothing else 
//->whereAlpha('post') // Laravel helper function where it should be upper or lowercase letter and nothing else
;
