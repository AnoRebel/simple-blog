@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-10 shadow-lg">
    <div class="jumbotron text-center bg-transparent shadow-lg">
      <h1 class="blog-post-title text-white-50">{{ $post->title }}</h1>
      <p class="blog-post-meta text-white-50">{{ $post->created_at }} by <a href="#">{{ $post->user->name }}</a></p>
    </div>

    <h4 class="text-white-50">{{ $post->body }}</h4>

  </div>


  <!-- <aside class="col-4 float-right">
    <div class="p-3 mb-3">
      <h4 class="font-italic">About</h4>
      <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum.</p>
    </div> -->

    <div class="p-3 col-lg-4 col-md-4">
      <h4 class="font-italic text-white-50"><i class="far fa-sun"></i>Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/posts/{{ $post->id }}/edit"><i class="far fa-edit"></i> Edit</a></li>
        <li><a href="/posts"><i class="far fa-envelope"></i> My Posts</a></li>
        <li><a href="/posts/create"><i class="far fa-envelope-open"></i> Add Post</a></li>
        @if ($post->created_by == Auth::user()->id)
          <li><a href="#deleteModal" data-postid="{{ $post->id }}" data-toggle="modal"><i class="far fa-trash-alt"></i> Delete</a></li>
        @endif
      </ol>
    </div>
  </aside>
</div>

<!-- Comment Panel -->
<div class="my-4 p-3 bg-dark rounded shadow-sm col-9 offset-1 bg-transparent">
  <form method="POST" action="{{ route('comments.store') }}">
      @csrf
      <h1 class="h3 mb-3 pb-2 text-white-50 font-weight-normal border-bottom"><i class="far fa-comment-dots"></i> {{ $post->comments->count() }} Comments</h1>
      <div class="form-group">
        <textarea style="border: none; resize: none;" class="float-left col-9 text-white form-control{{ $errors->has('body') ? ' is-invalid' : '' }} bg-transparent border-bottom" placeholder="Write your comment.." required="" name="body" id="body" rows="1"></textarea>
        @if ($errors->has('body'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
        <button class="float-right m-1 col-2 btn btn-sm btn-outline-warning float-right" type="submit"><i class="far fa-comment"></i> Comment</button>
      </div>
    </form>
    <br/>
  <h4 class="border-bottom border-gray text-white-50 pb-2 pt-4 mb-0"><i class="far fa-comments"></i> Recent comments</h4>
  <div class="media text-white-50 pt-3">
    {{--@foreach($post->comments as $comment)--}}
    <img alt="32x32" class="mr-2 rounded" src="/avatar.png" style="width: 32px; height: 32px;">
    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <strong class="d-block text-gray-dark">@username {{-- {{ $comment->user->name }} --}} on @date {{-- {{ $comment->created_at->diffForHumans() }} --}}</strong>
        <p> {{-- {{ $comment->body }} --}}Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      <a class="float-right text-warning"><i class="far fa-trash-alt"></i> Delete</a>
    </div>
    {{--@endforeach--}}
  </div>
  <!--<small class="d-block text-right mt-3">
    <a href="#">All comments</a>
  </small>-->
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal"><i class="far fa-sad-tear"></i> Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white-50" aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('posts.destroy',  $post->id) }}" method="POST">
          @method('DELETE')
          @csrf
        <div class="modal-body text-white-50">
          <h3 class="text-center text-dark">Are you sure you want to delete this post?</h3>
          <input type="hidden" name="post_id" id="post_id" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal"><i class="far fa-times-circle"></i> No, don't</button>
          <button class="btn btn-warning" type="submit"><i class="far fa-trash-alt"></i> Yes, I'm Sure</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection