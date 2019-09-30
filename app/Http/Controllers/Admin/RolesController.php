<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
use Illuminate\Support\Facades\Auth;


class RolesController extends Controller
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
        //
        if (Auth::user()->can('posts.user')) {
            $roles=Role::all();
            return view('backend.roles.show',compact('roles'));
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
            $permissions=Permission::all();
            // dd($permissions);
            return view('backend.roles.create',compact('permissions'));
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
            'name'=> 'required|unique:roles'
          ]);

        $role= new Role();
        $role->name= $request->name;
        $role->save();
        $role->permissions()->sync($request->permissions);
        session()->flash('message','Role created successfully');

        return redirect(url('admin/role'));
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
    public function edit($id)
    {
        if (Auth::user()->can('posts.user')) {
                    $role=Role::with('permissions')->find($id);
                    $permissions=Permission::all();
                    return view('backend.roles.edit',compact('role','permissions'));
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
        $this->validate($request,[
            'name'=> 'required'
        ]);
        $role=Role::find($id);
        $role->name= $request->name;
        $role->save();
        $role->permissions()->sync($request->permissions);
        session()->flash('message','Role updated successfully');

        return redirect(url('admin/role'));
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
        Role::find($id)->delete();
        session()->flash('message','Role deleted successfully');

        return redirect()->back();
    }
}
