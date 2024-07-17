@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            @if($post->image_path)
                <img src="{{ Storage::url($post->image_path) }}" class="card-img-top" alt="{{ $post->title }}">
            @endif
            <div class="card-body">
                <h1 class="card-title">{{ $post->title }}</h1>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text"><small class="text-muted">Создан {{ $post->user->name }} {{ $post->created_at->format('M d, Y') }}</small></p>
                <p class="card-text">Категория: {{ $post->category ? $post->category->name : 'По умолчанию' }}</p>
                <p class="card-text">
                    Теги:
                    @foreach($post->tags as $tag)
                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                    @endforeach
                </p>
            </div>

            <h2>Comments</h2>
            @foreach ($post->comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">{{ $comment->content }}</p>
                        <p class="card-text"><small class="text-muted">by {{ $comment->user->name }}</small></p>
                        @can('delete', $comment)
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>

            @endforeach

            @auth
            <form action="{{ route('comments.store', $post) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content">Add a comment:</label>
                    <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
            </form>
        @endauth
        </div>
    </div>
@endsection
