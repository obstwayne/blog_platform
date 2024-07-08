@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
{{--        <a href="{{ redirect()->route('home') }}" class="btn btn-primary">HOME</a>--}}
        <a href="{{ route('posts.create') }}" class="btn btn-primary mp-3">Create Post</a>

        <!-- Форма фильтрации -->
        <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="category_id">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="tag_id">
                        <option value="">All Tags</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ request('tag_id') == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @if($post->image_path)
                            <img src="{{ Storage::url($post->image_path) }}" class="card-img-top" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>

                            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>

                            <p class="card-text"><small class="text-muted">By {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</small></p>
                            <p class="card-text">Category: {{ $post->category ? $post->category->name : 'None' }}</p>
                            <p class="card-text">
                                Tags:
                                @foreach($post->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                @endforeach
                            </p>

                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection