@extends('backend.layouts.master')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css')}}">

@endsection
@section('content')
    <section class="content-header">
      <h1>
        Create Post
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
                <h3 class="box-title">Post Title</h3>
                </div>
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success col-lg-offset-3 col-lg-6"> {{session()->get('message')}} </div>
                    @endif
                </div>
                    @include('layouts.error')
                
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ url('admin/post') }}" method="POST" enctype="multipart/form-data">
                   {{ csrf_field() }}
                    <div class="box-body">
                        <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Post Title">
                            </div>
                            <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Enter Post Subtitle">
                            </div>
                            <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Post Slug">
                            </div>
                        </div>
                    

                        <div class="col-lg-6">
                            <div class="form-group">
                            <div class="pull-left">
                                        <label for="exampleInputFile">File input</label>
                                        <input type="file" id="image" name="image">
                                        </div> 
                                </div>
            
                                @foreach(Auth::user()->roles as $role)
                                @if($role->name=='SuperAdmin' || $role->name=='publisher')
                                
                                <div class="checkbox pull-right">
                                
                                        <label>
                                            <input type="checkbox" name="status" value="1"> Publish
                                        </label>
                                
                                </div>
                                @endif
                                @endforeach
                                
                                <br><br><br>
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Select Categories"
                                                style="width: 100%;" name="categories[]">
                                                
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Tags</label>
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Select Tags"
                                                style="width: 100%;" name="tags[]">
                                                
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                    @endforeach
                                        </select>
                                    </div>
                        </div>
            
                    </div>

                    
                        <div class="box">
                            <div class="box-header">
                            <h3 class="box-title">Write Post Body Here
                                <small>express it all the way down</small>
                            </h3>
                            <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                            title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                    
                                </div>
                            <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                            
                                <textarea name="body" 
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
                            
                            </div>
                        </div>
                    

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url('admin/post') }}" class="btn btn-warning">Cancel</a>

                            </div>
                        
                </form>
            </div>
        </div> 
    </div>              
    
    </section>

    @endsection

     @section('footerSection')
        <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
        <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
        </script>
        
        <script>
            $(document).ready(function(){
                $('.select2').select2();

            });
        </script>
    @endsection