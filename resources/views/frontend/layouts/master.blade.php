<!DOCTYPE html>
<html lang="en">

<head>
        @include('frontend.layouts.head')
</head>

<body>

  <!-- Navigation -->
        @include('frontend.layouts.header')
  

  <!-- Main Content -->
  @section('content')
      @show

  <hr>

  <!-- Footer -->
        @include('frontend.layouts.footer')
  
</body>

</html>
