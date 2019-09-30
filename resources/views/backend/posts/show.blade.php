@extends('backend.layouts.master')

@section('headSection')
<link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection

@section('content')

        <section class="content-header">
      <h1>
        Post Lists
        <small>advanced tables</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of posts</h3>
            </div>
            <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success col-lg-offset-3 col-lg-6"> {{session()->get('message')}} </div>
                    @endif
                </div>
            
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N.</th>
                  <th>Title</th>
                  <th>Subtitle</th>
                  <th>Slug(s)</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Body</th>
                  <th>Action</th>

                </tr>
                </thead>

                <tbody>
                    
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->subtitle}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->status}}</td>
                        <td>{{$post->image}}</td>
                        <td>{{str_limit($post->body,56)}}</td>
                        <td>
                        @can('posts.update',Auth::user())
                        <a href="{{ url('admin/post/'.$post->id.'/edit') }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                          @endcan

                          @can('posts.delete',Auth::user())
                        <form id="delete-form-{{ $post->id }}" action="{{ url('admin/post/'.$post->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                             <a href="" onclick="
                             if(confirm('Are you sure, You want to delete?'))
                             {
                               event.preventDefault();document.getElementById('delete-form-{{ $post->id }}').submit();
                               }
                               else{
                                event.preventDefault();
                                 }"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                 @endcan
                        </td>

                    </tr>
                    
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>S.N.</th>
                <th>Title</th>
                  <th>Subtitle</th>
                  <th>Slug(s)</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Body</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection

@section('footerSection')
<!-- DataTables -->
<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(function () {
    $('#example1').DataTable({
      "scrollY": true,
        "scrollX": true
    });
  });
</script>

@endsection