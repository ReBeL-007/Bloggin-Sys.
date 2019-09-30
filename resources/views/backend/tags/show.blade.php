@extends('backend.layouts.master')

@section('headSection')
<link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection

@section('content')

        <section class="content-header">
      <h1>
        Tag Lists
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of tags</h3>
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
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>
                        <a href="{{ url('admin/tag/'.$tag->id.'/edit') }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      
                        <form id="delete-form-{{ $tag->id }}" action="{{ url('admin/tag/'.$tag->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                             <a href="" onclick="
                             if(confirm('Are you sure, You want to delete?'))
                             {
                               event.preventDefault();document.getElementById('delete-form-{{ $tag->id }}').submit();
                               }
                               else{
                                event.preventDefault();
                                 }"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>S.N.</th>
                  <th>Name</th>
                  <th>Slug</th>
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
    $('#example1').DataTable()
  })
</script>

@endsection