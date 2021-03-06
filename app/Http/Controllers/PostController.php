<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with('category', 'author')->get(); //If we building up the query use get. (Eager load or include)
        return view(
            'posts',
            [
                'posts' => $this->getPost(),
                'categories' => Category::all()
            ]
        );
    }

    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }

    protected function getPost()
    {
      return Post::latest()->filter(request(['search', 'category']))->get();
    }
}
