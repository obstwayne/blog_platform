@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}'s Profile</h1>
        <p>Bio: {{ $profile->bio }}</p>
        <p>Website: <a href="{{ $profile->website }}">{{ $profile->website }}</a></p>
        <p>Location: {{ $profile->location }}</p>
        <a href="{{ route('profiles.edit', $user) }}" class="btn btn-primary">Edit Profile</a>

        <h2>Posts</h2>
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">View</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
