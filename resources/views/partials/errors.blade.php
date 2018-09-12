@if (isset($errors) && count($errors) > 0)
<div class="alert alert-warning alert-dismissible fade show gone" role="alert">
	@foreach ($errors->all() as $error)
  		<li><strong>{!! $error !!}</strong></li>
    @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif