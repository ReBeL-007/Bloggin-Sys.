<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Tag;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('can:posts.tag');       //u need to create 403 error page

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('posts.category')) {
        $tags= Tag::all();
        return view('backend.tags.show', compact('tags'));
            }
            return redirect(url('/admin'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.tag')) {
             return view('backend.tags.create');
            }
    return redirect(url('/admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required'
        ]);

        Tag::create(request(['name','slug']));
        session()->flash('message','Tag  created successfully');

        return redirect(url('admin/tag'));

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
    public function edit(Tag $tag)
    {
        //
        if (Auth::user()->can('posts.tag')) {

        return view('backend.tags.edit', compact('tag'));
        }
        return redirect(url('/admin'));
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
        //
        $t= Tag::find($id);
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required'
        ]);

        $t->name = $request->name;
        $t->slug = $request->slug;
        $t->save();
        session()->flash('message','Tag updated successfully');

        return redirect(url('admin/tag'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Tag::find($id)->delete();
        session()->flash('message','Tag updated successfully');

        return redirect()->back();
    }
}
