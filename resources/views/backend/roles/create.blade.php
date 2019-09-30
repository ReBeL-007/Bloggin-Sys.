@extends('backend.layouts.master')

@section('content')
    <section class="content-header">
      <h1>
        Create Role
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
                <h3 class="box-title">Role Title</h3>
                </div>
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success col-lg-offset-3 col-lg-6"> {{session()->get('message')}} </div>
                    @endif
                </div>
                @include('layouts.error')
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ url('admin/role')}}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                            <label for="name">Role</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter role title">
                            </div>
                              
                          <div class="row">
                          
                          <div class="col-lg-4">
                          <label>Post</label>
                          @foreach($permissions as $permission)
                                @if($permission->for=='post')
                                    
                                        
                                        <div class="checkbox"><label><input type="checkbox" name="permissions[]" value="{{$permission->id}}" >{{$permission->name}}</label>
                                        </div>
                                   
                                @endif
                            @endforeach
                            </div>

                            <div class="col-lg-4">
                                <label>User</label>
                                @foreach($permissions as $permission)
                                    @if($permission->for=='user')
                                            <div class="checkbox"> <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}" >{{$permission->name}}</label>
                                                </div>
                                        @endif
                                    @endforeach
                                </div>

                            <div class="col-lg-4">
                                <label>Others</label>
                                @foreach($permissions as $permission)
                                    @if($permission->for=='others')
                                            <div class="checkbox"> <label><input type="checkbox" name="permissions[]" value="{{$permission->id}}" >{{$permission->name}}</label>
                                                </div>
                                        @endif
                                    @endforeach
                                </div>
                           </div>
                            
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('admin/role') }}" class="btn btn-warning">Cancel</a>

                            </div>
                        </div>                                    
                    </div>                

                            
                        
                </form>
            </div>
        </div> 
    </div>              
    
    </section>

    @endsection

   