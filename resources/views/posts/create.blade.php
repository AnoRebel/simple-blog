@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-10">
      <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <h1 class="h2 mb-3 font-weight-normal text-white-50"><i class="far fa-edit"></i> Create Post</h1>
        <div class="form-group">
          <b><label class="h3 text-white-50" for="title"><i class="far fa-user"></i> Title</label></b>
          <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} bg-transparent text-white" name="title" id="title" placeholder="Enter Title" required="" autofocus="">
          @if ($errors->has('title'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <b><label class="h3 text-white-50" for="body"><i class="far fa-keyboard"></i> Content</label></b>
          <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }} bg-transparent text-white" name="body" id="body" rows="6"></textarea>
          @if ($errors->has('body'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('body') }}</strong>
              </span>
          @endif
        </div>
        <input class="btn btn-success float-right" value="Post" type="submit">
      </form>
    </div>

    <div class="p-3 col-lg-4 col-md-4">
      <h4 class="font-italic text-white-50"><i class="far fa-sun"></i> Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/posts"><i class="far fa-arrow-alt-circle-left"></i> Back</a></li>
      </ol>
    </div>
  </div>
</div>

@endsection