<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
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
            $users= Admin::all();
            return view('backend.users.show',compact('users'));
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
            $roles=Role::all();
            return view('backend.users.create',compact('roles'));
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
        // dd($request);
        $this->validate($request,[
                'name'=> 'required|string|max:255',
                'email'=> 'required|unique:users|string|email|max:255',
                'password'=> 'required|confirmed|min:8',
                'phone'=> 'required|numeric',
                'roles'=> 'required'
        ]);
        
        // Admin::create(request(['name','email','password','phone','status']));
        // dd($request);
        $users= new Admin();
        $users->name= $request->name;
        $users->email= $request->email;
        $users->password= bcrypt($request->password);
        $users->phone= $request->phone;
        $users->status= $request->status;
        $users->save();
        $users->roles()->sync($request->roles);
        session()->flash('message','User created successfully');

        return redirect(url('admin/user'));
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
        //
        if (Auth::user()->can('posts.user')) {
            $user= Admin::with('roles')->where('id',$id)->first();
            $roles= Role::all();
            return view('backend.users.edit',compact('user','roles'));
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
        // dd($request);
        $this->validate($request,[
                'name'=> 'required|string|max:255',
                'email'=> 'required|unique:users|string|email|max:255',
                'phone'=> 'required|numeric',
                'roles'=> 'required'
    ]);
    
    // Admin::create(request(['name','email','password','phone','status']));

    $users= Admin::find($id);
    $users->name= $request->name;
    $users->email= $request->email;
    $users->phone= $request->phone;
    $users->status= $request->status;
    $users->save();
    $users->roles()->sync($request->roles);
    session()->flash('message','User updated successfully');

    return redirect(url('admin/user'));
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
        Admin::find($id)->delete();
        session()->flash('message','User deleted successfully');

        return redirect()->back();
    }
}
