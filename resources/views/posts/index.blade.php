@extends('layouts.app') 

@section('content')

<div class="d-flex align-items-center p-3 text-white-50 bg-dark rounded-top shadow-sm col-9 offset-1 bg-transparent">
        <img class="mr-3" src="22.png" alt="48x48" width="48" height="48">
        <div class="lh-100">
          <h6 class="mb-0 lh-100"><i class="far fa-user-circle"></i> <a href="">{{ Auth::user()->name }}</a></h6>
          <small>joined {{ Auth::user()->created_at->diffForHumans() }}</small>
        </div>
      </div>


<div class="my-1 p-3 text-white-50 bg-dark shadow-sm col-9 offset-1 bg-transparent">
        <div class="pb-2 mb-0 border-bottom border-gray"><h6 class=""><i class="far fa-envelope"></i> My Posts <a class="float-right pb-1 btn btn-outline-info btn-sm" href="/posts/create"><i class="far fa-edit"></i> New</a></h6></div>
        @foreach($posts as $post)
        <div class="media text-muted pt-3">
          <img alt="32x32" class="mr-2 rounded" src="avatar.png" style="width: 32px; height: 32px;">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">{{ $post->title }}</strong>
              <a class="btn btn-sm btn-outline-primary" href="/posts/{{ $post->id }}"><i class="far fa-envelope-open"></i> View</a>
            </div>
            <span class="d-block">created by <a href="">{{ $post->user->name }}</a>, {{ $post->created_at->diffForHumans() }}</span>
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

      <div id="allPosts" class="my-1 p-3 text-white-50 bg-dark rounded-bottom shadow-sm col-9 offset-1 collapse bg-transparent" >
        <div class="pb-2 mb-0 border-bottom border-gray"><h6 class=""><i class="far fa-commentalt"></i> All Posts <a class="float-right pb-1 btn btn-outline-info btn-sm" href="/posts/create"><i class="far fa-edit"></i> New</a></h6></div>
        @foreach($allPosts as $allPost)
        <div class="media text-muted pt-3">
          <img alt="32x32" class="mr-2 rounded" src="avatar.png" style="width: 32px; height: 32px;">
          <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <div class="d-flex justify-content-between align-items-center w-100">
              <strong class="text-gray-dark">{{ $allPost->title }}</strong>
              
              <a class="btn btn-sm btn-outline-primary" href="/posts/{{ $allPost->id }}"><i class="far fa-envelope-open"></i> View</a>
            </div>
            <span class="d-block">{{ $allPost->user->name }} created {{ $allPost->created_at->diffForHumans() }}</span>
          </div>
        </div>
        @endforeach
      </div>

@endsection