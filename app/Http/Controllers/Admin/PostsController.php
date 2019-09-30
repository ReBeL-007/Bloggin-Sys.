<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Post;
use App\Model\User\Tag;
use App\Model\User\Category;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        // dd($posts);
        return view('backend.posts.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
        //
            $tags= Tag::all();
            $categories= Category::all();
            return view('backend.posts.create',compact('tags','categories'));
        }
        return redirect(url('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    //   dd($request->all());
        $this->validate($request,
        [
            'title'=> 'required',
            'subtitle'=> 'required',
            'slug'=> 'required',
            'body'=> 'required',
            'categories'=>'required',
            'tags'=>'required',
            'image'=>'required'
        ]);
            if($request->hasFile('image')){
                $imageName= $request->image->store('public/image');
            }
            //   $post= Post::create(request(['title','subtitle','slug','body','status']));
            //         $post->tags()->sync($request->tags);
            //         $post->categories()->sync($request->categories);
        $post= new Post();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->image=$imageName;
        $post->posted_by=Auth::user()->id;
        // dd($post);
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        
        // Post::create(request(['title','subtitle','slug','body','image','status']));

        session()->flash('message','Post created successfully');

        return redirect(url('admin/post'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        if (Auth::user()->can('posts.update')) {

            $post= Post::with('categories','tags')->where('id',$post)->first();
            $postImage=$post->image;
            $tags= Tag::all();
            $categories= Category::all();
            return view('backend.posts.edit', compact('post','tags','categories','postImage'));
        }
        return redirect(url('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $post= Post::find($id);
        $this->validate($request,
        [
            'title'=> 'required',
            'subtitle'=> 'required',
            'slug'=> 'required',
            'body'=> 'required',
            'categories'=>'required',
            'tags'=>'required',
            // 'image'=> 'required'
        ]);
        // dd($post);
            if($request->hasFile('image')){
                // $imageName=$post->image;
                $imageName= $request->image->store('public/image');
            }
            // $post->image= $imageName;
            $post->title= $request->title;
            $post->subtitle= $request->subtitle;
            $post->slug= $request->slug;
            $post->body= $request->body;
            $post->status= $request->status;
            $post->save();
            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->categories);
            session()->flash('message','Post updated successfully');
            return redirect(url('admin/post'));
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Post::find($id)->delete();
        session()->flash('message','Post deleted successfully');

        return redirect()->back();
        }

    
}
