<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class PostsController extends Controller
{
    public function show(Post $post){
        // dd($post);
        // $post= $post->all();
        return view('frontend.post',compact('post'));
    }

    public function getBlogs(){
        return $posts=Post::where('status',1)->latest()->paginate(4);

    }
}
