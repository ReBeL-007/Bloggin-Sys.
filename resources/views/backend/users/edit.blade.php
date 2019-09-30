@extends('backend.layouts.master')

@section('content')
    <section class="content-header">
      <h1>
        Update User
        <small>simple and fast</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-lg-12">
          <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">User Title</h3>
                </div>
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success col-lg-offset-3 col-lg-6"> {{session()->get('message')}} </div>
                    @endif
                </div>
                @include('layouts.error')
                <!-- /.box-header -->
                <!-- form start -->
                
                <form role="form" action="{{ url('admin/user/'.$user->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                            </div>
                            
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                            </div>

                            <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
                            </div>

                            <div class="form-group">
                            <label for="status">
                            <input type="checkbox" name="status" id="status" value="1" @if($user->status==1)checked @endif">status
                            </label>
                            </div>

                            <div class="form-group">
                            <label>Assign Role</label>
                                        <div class="row">
                                        @foreach($roles as $role)
                                        <div class="col-lg-3">
                                            <div class="checkbox">
                                            <label> <input type="checkbox" name="roles[]" value="{{$role->id}}" @foreach($user->roles as $user_role) @if($user_role->id==$role->id)checked @endif @endforeach>{{$role->name}}
                                                </label>
                                                </div>
                                        
                                        </div>
                                            @endforeach                                                                              
                                        </div>
                                    </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ url('admin/user') }}" class="btn btn-warning">Cancel</a>

                            </div>
                        </div>                                    
                    </div>                

                            
                        
                </form>
            </div>
        </div> 
    </div>              
    
    </section>

    @endsection