@extends('backend.layouts.master')

@section('content')
    <section class="content-header">
      <h1>
        Update Permission
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
                <h3 class="box-title">Permission Title</h3>
                </div>
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success col-lg-offset-3 col-lg-6"> {{session()->get('message')}} </div>
                    @endif
                </div>
                @include('layouts.error')
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ url('admin/permission/'.$permission->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$permission->name}}">
                            </div>

                            <div class="form-group">
                            <label for="for">Permission for</label>
                            <input type="text" class="form-control" name="for" id="for" value="{{$permission->for}}">
                            </div>
                            
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ url('admin/permission') }}" class="btn btn-warning">Cancel</a>

                            </div>
                        </div>                                    
                    </div>                

                            
                        
                </form>
            </div>
        </div> 
    </div>              
    
    </section>

    @endsection