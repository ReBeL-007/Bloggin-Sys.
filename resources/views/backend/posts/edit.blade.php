@extends('backend.layouts.master')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css')}}">

@endsection

@section('content')
    <section class="content-header">
      <h1>
        Update Post
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
                <form role="form" action="{{ url('admin/post/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="col-lg-6"> 
                            <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
                            </div>
                            <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{$post->subtitle}}">
                            </div>
                            <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{$post->slug}}">
                            </div>
                        </div>
                    

                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="pull-right">
                                    <label for="exampleInputFile">File input</label>
                                    
                                    

                                            <label for="exampleInputFile">File input</label>
                                        <input type="file" id="image" name="image" value="{{ $post->image}}">
                                            <span>{{ $postImage}}
                                            </span>
                                           
                                            
                                </div>

                                <div class="checkbox pull-left">
                                <label>
                                    <input type="checkbox" name="status" value="1" @if ($post->status == 1) checked @endif> Publish
                                </label>
                                </div>

                                <br><br><br><br><br>
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select class="form-control select2" multiple="multiple" name="categories[]"
                                                style="width: 100%;">
                                                
                                                @foreach($categories as $cat)
                                                <option value="{{$cat->id}}" 
                                                     @foreach($post->categories as $postcat)

                                                     @if($postcat->id == $cat->id)
                                                     selected
                                                     @endif
                                                     @endforeach
                                                     >
                                                     {{$cat->name}}</option>
                                                     @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Tags</label>
                                        <select class="form-control select2" multiple="multiple" name="tags[]" 
                                                style="width: 100%;">
                                                
                                                @foreach($tags as $tag)
                                                <option value="{{$tag->id}}"
                                                    @foreach($post->tags as $posttag)
                                                    @if($tag->id == $posttag->id)
                                                    selected
                                                    @endif
                                                    @endforeach
                                                    >{{$tag->name}}</option>
                                                    
                                                    @endforeach
                                        </select>
                                    </div>
                            </div>
                            <br>
                            <br>
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
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">
                            
                                        {{ $post->body}}
                                        </textarea>
                            
                            </div>
                        </div>
                    

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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