<?php

namespace App\Model\User;

use App\Model;

class Category extends Model
{
    //
    public function posts(){
        return $this->belongsToMany(Post::class,'category_posts')->latest()->paginate(5);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
