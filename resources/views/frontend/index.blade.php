@extends('frontend.layouts.master')

@section('bg-img',asset('frontend/img/home-bg.jpg'))
@section('title','Blog')
@section('subheading','Blog')
@section('head')

  <style>
    .fa-thumbs-up:hover{
      color:green;
    }
  </style>
@endsection

@section('content')

<div class="container" id="app">
    <div class="row" >
      <div class="col-lg-8 col-md-10 mx-auto">
@foreach($posts as $post)

      <div class="post-preview">
          <a href="{{ url('post',$post->slug)}}">
            <h2 class="post-title">
              {{$post->title}}
            </h2>
            <h3 class="post-subtitle">
              {{$post->subtitle}}            
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            {{$post->created_at}}
            <a href=""> 
               <small>0</small> 
              <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                </a>
            </p>
             <hr>
        </div>

        @endforeach
        <!-- Pager -->
        <div class="clearfix">
            {{ $posts->links()}}

        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('footer')
     
    @endsection