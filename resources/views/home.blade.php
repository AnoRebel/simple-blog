@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-transparent text-white border-success">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <p>Hi {{ Auth::user()->name }}</p>
                        <p>You are logged in now!</p>
                        <h3>Click <a href="{{ route('posts.index') }}">here</a> for posts</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
