
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <p class="card-text">
                {{ $post->category->name ?? 'No category' }}
            </p>
            <div class="col-md-4">
                <img src="{{ $post->image_path }}" class="img-fluid rounded" alt="{{ $post->title }}">
            </div>
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <div class="mt-3">
                    <p>{{ $post->content }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-info" href="{{ route('posts.index') }}">Вернуться к постам</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Редактировать</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот пост?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


