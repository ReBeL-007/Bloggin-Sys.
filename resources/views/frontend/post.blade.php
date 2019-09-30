@extends('frontend.layouts.master')

@section('bg-img',Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('subheading',$post->subtitle)

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>
<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <small>created at {{$post->created_at->diffForHumans()}}</small>

        @foreach($post->categories as $category)
        <a href="{{ url('category',$category->slug)}}"><small class="pull-right" style="margin-right:10px;">{{$category->name}}</small></a>
        @endforeach
            {!! htmlspecialchars_decode($post->body) !!}

            <h6>Tag Clouds</h6>
            @foreach($post->tags as $tag)
        <a href="{{ url('tag',$tag->slug)}}"<small class="pull-left" style="margin-right:10px;border:1px solid grey;border-radius:5px;padding:5px;">{{$tag->name}}</small></a>
        @endforeach
        </div>
        <div class="fb-comments" data-href="{{ Request::url()}}" data-width="" data-numposts="5"></div>
      </div>
    </div>
  </article>
  @endsection