@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-8 float-left">
    <form method="POST" action="{{ route('posts.store') }}">
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">Create Post</h1>
      <div class="form-group">
        <label for="title" class="sr-only">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required="" autofocus="">
      </div>
      <div class="form-group">
        <label for="body">Content</label>
        <textarea class="form-control" name="body" id="body" rows="6"></textarea>
      </div>
      <input class="btn btn-success float-right" value="Submit" type="submit">
    </form>
  </div>


  <aside class="col-4 float-right">
      <div class="p-3">
        <h4 class="font-italic">Actions</h4>
        <ol class="list-unstyled">
          <li><a href="/posts">Back</a></li>
        </ol>
      </div>
  </aside>
</div>

@endsection