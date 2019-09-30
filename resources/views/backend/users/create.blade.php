@extends('backend.layouts.master')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css')}}">

@endsection

@section('content')
    <section class="content-header">
      <h1>
        Create User
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
                
                @include('layouts.error')
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ url('admin/user')}}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter user Name">
                            </div>
                            
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter user email">
                            </div>

                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                            </div>

                            <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter confirm password">
                            </div>

                            <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone no.">
                            </div>

                            <div class="form-group">
                            <label for="status">Status</label>
                            
                            <div class="checkbox">
                            
                                <label><input type="checkbox" name="status" id="status" value="1">Active</label>
                            </div>
                            
                            </div>

                            <div class="form-group">
                                        <label>Assign Role</label>
                                        <div class="row">
                                        @foreach($roles as $role)
                                        <div class="col-lg-3">
                                            <div class="checkbox">
                                            <label> <input type="checkbox" name="roles[]" value="{{$role->id}}">{{$role->name}}
                                                </label>
                                                </div>
                                        
                                        </div>
                                            @endforeach                                                                              
                                        </div>
                                </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

   @section('footerSection')
   <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
            $(document).ready(function(){
                $('.select2').select2();

            });
        </script>
   @show