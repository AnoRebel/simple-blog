@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-8 float-left">
    <form method="POST" action="{{ route('posts.update', [$post->id]) }}">
      @method('PUT')
      @csrf
      <h1 class="h3 mb-3 font-weight-normal"><i class="far fa-edit"></i> Edit Post</h1>
      <div class="form-group">
        <b><label for="title"><i class="far fa-user"></i> Title</label></b>
        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" placeholder="Enter Title" value="{{ $post->title }}" required="" autofocus="">
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <b><label for="body"><i class="far fa-keyboard"></i> Content</label></b>
        <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" id="body" rows="6"> {{ $post->body }} </textarea>
        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
      </div>
      <input class="btn btn-success float-right" value="Submit" type="submit">
    </form>
  </div>


  <aside class="col-4 float-right">
      <div class="p-3">
        <h4 class="font-italic"><i class="far fa-sun"></i> Actions</h4>
        <ol class="list-unstyled">
          <li><a href="/posts/{{ $post->id }}"><i class="far fa-arrow-alt-circle-left"></i> Back</a></li>
          <li><a href="/posts/create"><i class="far fa-envelope-open"></i> New Post</a></li>
          <li><a href="/posts"><i class="far fa-envelope"></i> My Posts</a></li>
        </ol>
      </div>
  </aside>
</div>

@endsection