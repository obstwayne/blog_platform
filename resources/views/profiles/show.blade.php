@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Профиль {{ $user->name }}</h1>
        <p>Описание: {{ $profile->bio }}</p>
        <p>Сайт: <a href="{{ $profile->website }}">{{ $profile->website }}</a></p>
        <p>Страна: {{ $profile->location }}</p>
        <a href="{{ route('profiles.edit', $user) }}" class="btn btn-primary">Редактировать профиль</a>

        <h2>Записи</h2>
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-secondary">Просмотр</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
