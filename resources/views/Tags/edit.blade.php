@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать тег</h1>
        <form action="{{ route('tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
