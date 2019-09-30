<!DOCTYPE html>
<html>
<head>
    @include('backend.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    @include('backend.layouts.header')
    </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('backend.layouts.sidebar')
  </aside>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @section('content')
      @show
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
        @include('backend.layouts.footer')
       
</body>
</html>
