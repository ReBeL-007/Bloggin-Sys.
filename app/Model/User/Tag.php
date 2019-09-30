<?php

namespace App\Model\User;

use App\Model;

class Tag extends Model
{
    //
    public function posts(){
        return $this->belongsToMany(Post::class,'post_tags')->latest()->paginate(5);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
