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
        </div>
    </div>
@endsection
