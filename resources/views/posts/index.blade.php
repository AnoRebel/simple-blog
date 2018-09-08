@extends('layouts.app') 

@section('content')

<div class="d-flex align-items-center p-3 text-white-50 bg-dark rounded-top shadow-sm col-9 offset-1">
        <img class="mr-3" src="" alt="Img" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 lh-100">{{ Auth::user()->name }}</h6>
          <small>joined {{ Auth::user()->created_at->diffForHumans() }}</small>
        </div>
      </div>


<div class="my-1 p-3 text-white-50 bg-dark shadow-sm col-9 offset-1">
        <div class="pb-2 mb-0 border-bottom border-gray"><h6 class="">My Posts <a class="float-right pb-1 btn btn-outline-info btn-sm" href="/posts/create">New</a></h6></div>
        @foreach($posts as $post)
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&amp;bg=6f42c1&amp;fg=6f42c1&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1657ffaf7f7%20text%20%7B%20fill%3A%236f42c1%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1657ffaf7f7%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%236f42c1%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.046875%22%20y%3D%2217.2%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">{{ $post->title }}</strong>
              <a class="btn btn-sm btn-outline-primary" href="/posts/{{ $post->id }}">View</a>
            </div>
            <span class="d-block">{{ $post->user->name }} created {{ $post->created_at->diffForHumans() }}</span>
          </div>
        </div>
        @endforeach
        <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
          <small class="d-block text-right mt-3">
            <div id="showPosts">
              <a data-toggle="collapse" href="#allPosts" role="button" aria-expanded="false" aria-controls="allPosts">All posts</a>
            </div>
          </small>
        </div>
      </div>

      <div id="allPosts" class="my-1 p-3 text-white-50 bg-dark rounded-bottom shadow-sm col-9 offset-1 collapse" >
        <div class="pb-2 mb-0 border-bottom border-gray"><h6 class="">All Posts <a class="float-right pb-1 btn btn-outline-info btn-sm" href="/posts/create">New</a></h6></div>
        @foreach($allPosts as $allPost)
        <div class="media text-muted pt-3">
          <img data-src="holder.js/32x32?theme=thumb&amp;bg=6f42c1&amp;fg=6f42c1&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1657ffaf7f7%20text%20%7B%20fill%3A%236f42c1%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1657ffaf7f7%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%236f42c1%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.046875%22%20y%3D%2217.2%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">{{ $allPost->title }}</strong>
              
              <a class="btn btn-sm btn-outline-primary" href="/posts/{{ $allPost->id }}">View</a>
            </div>
            <span class="d-block">{{ $allPost->user->name }} created {{ $allPost->created_at->diffForHumans() }}</span>
          </div>
        </div>
        @endforeach
      </div>

@endsection