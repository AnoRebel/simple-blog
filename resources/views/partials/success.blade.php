@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show gone" role="alert">
  <strong>
  	{!! session()->get('success') !!}
  </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif