@extends('layouts.app')
@section('title','Product - iCATCH')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <!-- Фильтры слева -->
            <div class="col-md-3">
                <!-- Фильтр по цене -->
                <div class="mb-4">
                    <h5>Цена</h5>
                    <input type="range" class="form-range" min="0" max="500" step="10">
                </div>
                <!-- Фильтр по вкусу чая -->
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
                <!-- Дополнительные фильтры -->
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

            <!-- Карточки чая справа -->
            <div class="col-md-9 d-flex justify-content-center">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            @foreach($products as $product)
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">An item</li>
                                        <li class="list-group-item">A second item</li>
                                        <li class="list-group-item">A third item</li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>


@endsection
