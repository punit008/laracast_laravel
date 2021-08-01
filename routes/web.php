<?php

use App\Models\Post;
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
    $posts = Post::all();
  
    return view('posts',
        [
            'posts' => $posts
        ]
    );
});

Route::get('/post/{post}', function ($slug) {
    // Find a post by its slug and pass it to a view called "post"
    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);



    // return view('post');
})
//->where('post', '[A-z]+') // Find one or more upper or lowercase letter and nothing else
->where('post', '[A-z_\-]+') // Find one or more upper or lowercase letter including - in url and nothing else 
//->whereAlpha('post') // Laravel helper function where it should be upper or lowercase letter and nothing else
;
