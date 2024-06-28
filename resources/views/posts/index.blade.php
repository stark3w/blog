@extends('layouts.app')



@section('content')
    <div class="container d-flex justify-content-center align-items-center"><h1>Посты</h1></div>
    <div class="row p-5 mt-6 row-cols-1 row-cols-md-5 g-4">
        @foreach($posts as $post)
        <div class="col ">
            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
            <div class="card h-100 shadow-sm grow-on-hover">
                <div class="position-relative">
                <img src="{{ $post->image_path }}" class="card-img-top" >
                <div class="view-overlay">
                    <span>Тыкни для просмотра</span>
                </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post->category->name ?? 'No category' }}
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <small class="text-body-secondary">{{ $post->created_at }}</small>
                    <small class="text-body-secondary"> Просмотров: {{ $post->views }}</small>
                </div>
            </div>
            </a>
        </div>
        @endforeach
        <div>
            {{ $posts->links() }}
        </div>
            </div>
@endsection

<style>
    .grow-on-hover:hover {
        transform: scale(1.03);
        transition: transform 0.3s ease;
    }
    .position-relative {
        position: relative;
    }

    .view-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        text-align: center;
        transition: height 0.3s ease, opacity 0.3s ease;
    }

    .position-relative:hover .view-overlay {
        height: 30px;
    }

    .view-overlay span {
        display: inline-block;
        line-height: 30px;
    }

</style>
