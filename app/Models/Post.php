<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id']; // Everything can be mass assigned except id.
    // protected $fillable = ['title'];

    // public function getRouteKey()
    // {
    //     return 'slug';
    // }
 
   // protected $with = ['category','author']; //eager load relationship 

    public function scopeFilter($query, array $filters)
    {         
        if ($filters['search'] ?? false) {      
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
        if ($filters['category'] ?? false) {    
            // $query
            //     ->whereExists(fn($query) =>
            //         $query->from('categories')
            //         ->whereColumn('categories.id', 'posts.category_id')
            //         ->where('category.slug', request('search')) 
            //     );

            $query->whereHas(
                'category', fn ($query) =>
                    $query->where('slug', request('category'))
            );
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function category()
    { 
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {               
        return $this->belongsTo(User::class, 'user_id');
    }


}
