@extends('layouts.app')

@section('title','Главная страница')

@section('content')
    <div class="container d-flex justify-content-center align-items-center"><h1>Добро пожаловать на CodeCraze BLOG</h1></div>
    <div>
        @foreach($posts as $post)
           <div>{{ $post->title }}</div>
           <div> {{ $post->content }}</div>

        @endforeach
    </div>
@endsection
