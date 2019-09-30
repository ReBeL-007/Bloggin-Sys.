<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User\Category;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
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
        if (Auth::user()->can('posts.category')) {
        $categories= Category::all();
        return view('backend.categories.show', compact('categories'));
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
        if (Auth::user()->can('posts.category')) {
            return view('backend.categories.create');
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
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required'
        ]);

        Category::create(request(['name','slug']));
        session()->flash('message','Category created successfully');

        return redirect(url('admin/category'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category )
    {
        //
        if (Auth::user()->can('posts.category')) {
            return view('backend.categories.edit', compact('category'));
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
        $cat= Category::find($id);
        $this->validate($request,[
            'name'=>'required',
            'slug'=>'required'
        ]);

        $cat->name = $request->name;
        $cat->slug = $request->slug;
        $cat->save();
        session()->flash('message','Category updated successfully');

        return redirect(url('admin/category'));

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
        Category::find($id)->delete();
        session()->flash('message','Category deleted successfully');

        return redirect()->back();
    }
}
