@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-8 float-left">
    <form method="POST" action="{{ route('posts.update', [$post->id]) }}">
      @method('PUT')
      @csrf
      <h1 class="h3 mb-3 font-weight-normal">Edit Post</h1>
      <div class="form-group">
        <label for="title" class="sr-only">Title</label>
        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" placeholder="Enter Title" value="{{ $post->title }}" required="" autofocus="">
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label for="body">Content</label>
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
        <h4 class="font-italic">Actions</h4>
        <ol class="list-unstyled">
          <li><a href="/posts/{{ $post->id }}">Back</a></li>
          <li><a href="/posts/create">New Post</a></li>
          <li><a href="/posts">My Posts</a></li>
          <li><a href="#deleteModal" data-toggle="modal">Delete</a></li>
        </ol>
      </div>
  </aside>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="deleteModal">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white-50" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-white-50">
        <h3>Are you sure you want to delete this post?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('posts.destroy', [$post->id]) }}" method="POST">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection