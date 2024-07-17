@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>
        <!-- <p>Website: <a href="{{ $user->website }}">{{ $user->website }}</a></p> -->

        <h2>Posts</h2>
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">View Post</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
