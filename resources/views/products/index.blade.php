@extends('layouts.app')
@section('title','Product - iCATCH')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="mb-4">
                    <h5>Цена</h5>
                    <input type="range" class="form-range" min="0" max="500" step="10">
                </div>
                <div class="mb-4">
                    <h5>Вкус чая</h5>
                    <select class="form-select">
                        <option selected>Выберите вкус</option>
                        <option value="1">Зеленый чай</option>
                        <option value="2">Черный чай</option>
                        <option value="3">Мятный чай</option>
                        <option value="4">Ягодный чай</option>
                    </select>
                </div>
                <div class="mb-4">
                    <h5>Сорт чая</h5>
                    <select class="form-select">
                        <option selected>Выберите сорт</option>
                        <option value="1">Премиум</option>
                        <option value="2">Средний</option>
                        <option value="3">Эконом</option>
                    </select>
                </div>
                <div class="mb-4">
                    <h5>Бренд чая</h5>
                    <select class="form-select">
                        <option selected>Выберите бренд</option>
                        <option value="1">Lipton</option>
                        <option value="2">Greenfield</option>
                        <option value="3">Twinings</option>
                    </select>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($products as $product)
                        <div class="col">
                            <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 d-flex flex-column">
                                <img src="{{ $product->image }}" class="card-img-top tea-card-img" alt="{{ $product->name }}">
                                <div class="card-body" style="min-height: 150px;">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                </div>
                                <div class="card-footer mt-auto d-flex justify-content-between align-items-center">
                                    <span>★★★★☆</span>
                                    <span>{{ $product->price }} руб.</span>
                                </div>
                                <div class=" mt-auto">
                                <a href="#" class="btn btn-primary w-100 mt-2">Добавить в корзину</a>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

