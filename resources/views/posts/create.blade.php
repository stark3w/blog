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
            <div>
                <label for="category" class="form-label">Категория поста</label>
                <select id="category" class="mb-3 form-select" name="category_id">
                    <option selected disabled>Выберите категорию</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Контент</label>
                <textarea id="content" name="content" class="form-control" rows="15">{{ old('content') }}</textarea>
            </div>
            <div>
                <label for="image" class="form-label">Изображение</label>
                <input id="image" type="file" class="form-control mb-3" name="image_path">
            </div>
            <div>
                <label for="tags" class="form-label">Тэги</label>
                <select id="tags" class="form-select" multiple name="tags[]">
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-info" href="{{ route('posts.index') }}">Вернуться к постам</a>
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>




    </div>
@endsection


