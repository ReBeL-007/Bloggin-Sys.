<?php

namespace App\Model\User;

use App\Model;

class Post extends Model
{
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tags')->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'category_posts')->withTimestamps();
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
