<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PermissionController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
                // $this->middleware('can:posts.user');       //u need to create 403 error page

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('posts.user')) {
            $permissions=Permission::all();
            // dd($permissions);
            return view('backend.permissions.show',compact('permissions'));
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
        if (Auth::user()->can('posts.user')) {
            return view('backend.permissions.create');
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
                'name' => 'required',
                'for' => 'required'

        ]);

        $permission= new Permission();
        $permission->name= $request->name;
        $permission->for= $request->for;
        $permission->save();
        session()->flash('message','Permission created successfully');
        return redirect(url('admin/permission'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        if (Auth::user()->can('posts.user')) {
            $permission= Permission::find($permission->id);
            return view('backend.permissions.edit',compact('permission'));
        }
            return redirect(url('/admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
        $this->validate($request,[
            'name' => 'required',
            'for' => 'required'
    ]);

    $permission= Permission::find($permission->id);
    $permission->name= $request->name;
    $permission->for= $request->for;
    $permission->save();
    session()->flash('message','Permission updated successfully');
    return redirect(url('admin/permission'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
        Permission::find($permission->id)->delete();
        session()->flash('message','Permission deleted successfully');
        return redirect(url('admin/permission'));

    }
}
