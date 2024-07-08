@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать профиль</h1>
        <form action="{{ route('profiles.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="bio" class="form-label">Описание</label>
                <textarea class="form-control" id="bio" name="bio">{{ $profile->bio }}</textarea>
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Сайт</label>
                <input type="url" class="form-control" id="website" name="website" value="{{ $profile->website }}">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Страна</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $profile->location }}">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
@endsection
