<?php

use App\Models\Post;
use App\Models\Posts;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File as FacadesFile;


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

    // Log Sql of the query

    // \Illuminate\Support\Facades\DB::listen(function ( $query ) {
    //     logger($query->sql, $query->bindings);
    // });

    // $files = FacadesFile::files(resource_path("views/posts"));

    // $posts = [];

    // collect an array an wrap them with in collection
    // $posts = collect($files)->map(function ($file) {


    //     return YamlFrontMatter::parseFile($file);
    // })
    //     ->map(function ($document) {
    //         return new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body,
    //             $document->slug
    //         );
    //     });

    // $posts = array_map(function ($file) {
    //     $document =  YamlFrontMatter::parseFile( $file );
    //     return new Post(
    //        $document->title,
    //        $document->excerpt,
    //        $document->date,
    //        $document->body,
    //        $document->slug
    //     );
    // }, $files);

    // foreach ($files as $file) {

    //    $document =  YamlFrontMatter::parseFile( $file );
    //    $posts[] = new Post(
    //        $document->title,
    //        $document->excerpt,
    //        $document->date,
    //        $document->body,
    //        $document->slug
    //    );

    // }

    // $posts = Post::all();
    // Solve n+1 trap
    $posts = Post::latest()->with('category')->get(); //If we building up the query use get. (Eager load or include)

    return view(
        'posts',
        [
            'posts' => $posts
        ]
    );
});

Route::get('/post/{post:slug}', function (Post $post) {// Post::where('slug', $post)->firstOrFail()
    
    // Find a post by its slug and pass it to a view called "post"
    // $post = Post::find($slug);
    // $post = Post::findOrFail($id);

    return view('post', [
        'post' => $post
    ]);



    // return view('post');
})
    //->where('post', '[A-z]+') // Find one or more upper or lowercase letter and nothing else
    //->where('post', '[A-z_\-]+') // Find one or more upper or lowercase letter including - in url and nothing else 
    //->whereAlpha('post') // Laravel helper function where it should be upper or lowercase letter and nothing else
;

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts',
        [
            'posts' => $category->post
        ]
    );
});
