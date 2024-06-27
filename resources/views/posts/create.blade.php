@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div><h1>Добавление нового поста</h1></div>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input id="title" class="form-control" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Контент</label>
                <textarea id="content" name="content" class="form-control" rows="15">{{ old('content') }}</textarea>
            </div>
            <div>
                <label for="image" class="form-label">Изображение</label>
                <input id="image" type="file" class="form-control mb-3" name="image_path">
            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route('posts.index') }}">Вернуться к постам</a>
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>




    </div>
@endsection


