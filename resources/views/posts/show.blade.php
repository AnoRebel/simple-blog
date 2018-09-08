@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-8 float-left">
    <div class="jumbotron text-center">
      <h1 class="blog-post-title">{{ $post->title }}</h1>
      <p class="blog-post-meta">{{ $post->created_at }} by <a href="#">{{ $post->user->name }}</a></p>
    </div>

    <h4>{{ $post->body }}</h4>

  </div>


  <!-- <aside class="col-4 float-right">
    <div class="p-3 mb-3">
      <h4 class="font-italic">About</h4>
      <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum.</p>
    </div> -->

    <div class="p-3">
      <h4 class="font-italic">Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/posts/{{ $post->id }}/edit">Edit</a></li>
        <li><a href="/posts">My Posts</a></li>
        <li><a href="/posts/create">Add Post</a></li>
        @if ($post->created_by == Auth::user()->id)
          <li><a href="#deleteModal" data-postid="{{ $post->id }}" data-toggle="modal">Delete</a></li>
        @endif
      </ol>
    </div>
  </aside>
</div>


<div class="my-3 p-3 bg-dark rounded shadow-sm col-9 offset-1">
  <form method="POST" action="{{ route('comments.store') }}">
      @csrf
      <h1 class="h3 mb-3 pb-2 text-white-50 font-weight-normal border-bottom">Comments</h1>
      <div class="form-group">
        <textarea style="border: none; resize: none;" class="float-left col-9 text-white form-control bg-transparent border-bottom" placeholder="Write your comment.." required="" name="body" id="body" rows="1"></textarea>
        <input class="float-right col-2 btn btn-sm btn-outline-warning float-right" value="Comment" type="submit">
      </div>
    </form>
    <br/>
  <h4 class="border-bottom border-gray text-white-50 pb-2 pt-4 mb-0">Recent comments</h4>
  <div class="media text-muted pt-3">
    <img data-src="holder.js/32x32?theme=thumb&amp;bg=6f42c1&amp;fg=6f42c1&amp;size=1" alt="32x32" class="mr-2 rounded" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1657ffaf7f7%20text%20%7B%20fill%3A%236f42c1%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1657ffaf7f7%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%236f42c1%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2211.046875%22%20y%3D%2217.2%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
      <strong class="d-block text-gray-dark">@username</strong>
      Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
    </p>
  </div>
  <!--<small class="d-block text-right mt-3">
    <a href="#">All comments</a>
  </small>-->
</div>

<!-- Delete Modal -->
<div class="modal modal-warning fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="deleteModal">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-white-50" aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('posts.destroy') }}" method="POST">
          @method('DELETE')
          @csrf
        <div class="modal-body text-white-50">
          <h3 class="text-center">Are you sure you want to delete this post?</h3>
          <input type="hidden" name="post_id" id="post_id" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">No, don't</button>
          <button class="btn btn-warning" type="submit">Yes, I'm Sure</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection