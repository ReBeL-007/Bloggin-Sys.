@extends('frontend.layouts.master')

@section('bg-img',asset('frontend/img/about-bg.jpg'))
@section('title','You are logged in!')

@section('content')
<article>
    <div class="container">
      <div class="row">
      <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
      </div>
    </div>
  </article>
  @endsection












