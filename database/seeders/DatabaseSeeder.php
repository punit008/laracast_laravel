<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Category::truncate();
        // Post::turncate();

        Post::factory()->create();
        // \App\Models\User::factory(10)->create();
        // $user = \App\Models\User::factory()->create();

        // $personal = Category::create([
        //     'name'  => 'Personal',
        //     'slug'  => 'personal'
        // ]);

        // $family = Category::create([
        //     'name'  => 'Family',
        //     'slug'  => 'family'
        // ]);

        // $work = Category::create([
        //     'name'  => 'Work',
        //     'slug'  => 'work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' =>  'My first post',
        //     'slug'  =>  'my-first-post',
        //     'excerpt' => 'Lorem ipsum dolar sit amet.',
        //     'body'    =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus sapiente delectus aliquam at, aliquid veritatis commodi amet atque voluptates quas illum magnam nam eaque minima, numquam, esse aspernatur id ad.'  
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' =>  'My second post',
        //     'slug'  =>  'my-second-post',
        //     'excerpt' => 'Lorem ipsum dolar sit amet.',
        //     'body'    =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus sapiente delectus aliquam at, aliquid veritatis commodi amet atque voluptates quas illum magnam nam eaque minima, numquam, esse aspernatur id ad.'  
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' =>  'My third post',
        //     'slug'  =>  'my-third-post',
        //     'excerpt' => 'Lorem ipsum dolar sit amet.',
        //     'body'    =>  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus sapiente delectus aliquam at, aliquid veritatis commodi amet atque voluptates quas illum magnam nam eaque minima, numquam, esse aspernatur id ad.'  
        // ]);

        
    }
}
