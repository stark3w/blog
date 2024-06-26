
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

                <a class="btn btn-info" href="{{ route('posts.index') }}">Вернуться к постам</a>
            </div>
        </div>
    </div>
@endsection


