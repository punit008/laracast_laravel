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
