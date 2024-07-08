@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Users</h1>
        <form action="{{ route('users.search') }}" method="GET" class="mb-4">
            <input type="text" name="query" class="form-control" placeholder="Search users...">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>
        <div class="list-group">
            @foreach ($users as $user)
                <a href="{{ route('users.show', $user) }}" class="list-group-item list-group-item-action">
                    {{ $user->name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
