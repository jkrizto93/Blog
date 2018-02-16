@extends('layout')
@section('meta-title',$post->title)
@section('meta-description',$post->excerpt)
@section('content')
<article class="post container">
        @include($post->viewType())
     
    <div class="content-post">
      @include('posts.header')
      <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
        	{!!$post->body!!}
        </div>

        <footer class="container-flex space-between">
          @include('partials.social-links',['description'=> $post->title])
          @include('posts.tags')
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
        @include('partials.disqus')
                                
      </div><!-- .comments -->
    </div>
 </article>
@endsection
@push('styles')
<link rel="stylesheet" type="text/css" href="/css/Bbootstrap.css">
@endpush

@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
    <script
        src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    
     <script src="/js/Bbootstrap.js"></script>


@endpush