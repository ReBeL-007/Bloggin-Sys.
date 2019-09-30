<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;
use App\Model\User\Tag;
use App\Model\User\Category;

class PagesController extends Controller
{
    public function index(){
        $posts=Post::where('status',1)->latest()->paginate(4);
        return view('frontend.index',compact('posts'));
    }

    public function tag(Tag $tag){
       $posts= $tag->posts();
       return view('frontend.index',compact('posts'));

    }

    public function category(Category $category){
        $posts= $category->posts();
       return view('frontend.index',compact('posts'));
    }
}
