@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Создать тег</h1>
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
