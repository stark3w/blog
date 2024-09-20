@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container py-4">
        <div class="row">
            <!-- Название товара -->
            <div class="col-12 mb-4 text-center">
                <h1>{{ $product->name }}</h1>
            </div>
        </div>

        <div class="row">
            <!-- Фото товара -->
            <div class="col-md-6 mb-4 d-flex justify-content-center">
                <img src="{{ $product->image }}" class="img-fluid" alt="{{ $product->name }}">
            </div>

            <!-- Информация о товаре и кнопки -->
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <div class="d-flex flex-column align-items-center">
                    <h3 class="text-center mb-3">{{ $product->price }} руб.</h3>
                    <div class="mb-3">
                        <a href="#" class="btn btn-primary w-100">Добавить в корзину</a>
                    </div>
                    <div class="mb-3">
                        <a href="#" class="btn btn-success w-100">Купить</a>
                    </div>
                    @can('update', \App\Models\Product::class)
                    <div class="mb-3">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success w-100">Редактировать</a>
                    </div>
                    @endcan
                    @can('delete', \App\Models\Product::class)
                        <form action="{{ route('products.destroy', $product->id) }}" method="post" onsubmit="return confirm('Точно удаляем?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger w-100" >Удалить товар</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- Описание товара -->
        <div class="row">
            <div class="col-12">
                <h4>Описание товара</h4>
                <p>{{ $product->description }}</p>
            </div>
        </div>
    </div>

@endsection
