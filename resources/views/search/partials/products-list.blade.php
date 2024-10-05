<div class="no-layout-impact">
    <div class="col-md-9">
        <div id="loading-spinner" style="display: none;">
            <i class="fas fa-spinner fa-spin"></i> Загрузка...
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($products as $product)
                <div class="col custom-col">
                    <a href="{{ route('found.show', ['product_slug' => $product->slug] ) }}"
                       class="text-decoration-none text-dark">
                        <div class="card h-100 hover-scale custom-card-size">
                            <img src="{{ $product->image }}" class="card-img-top tea-card-img"
                                 alt="{{ $product->name }}">
                            <div class="card-body" style="min-height: 150px; ">
                                <h5 class="card-title">{{ $product->name }}</h5>
                            </div>
                            <div class="card-footer mt-auto d-flex justify-content-between align-items-center">
                                <span>★★★★☆</span>
                                <span>{{ $product->price }} руб.</span>
                            </div>
                            <div class=" mt-auto">
                                <a href="#" class="btn btn-primary w-100 mt-2">Добавить в корзину</a>
                                @can('delete',\App\Models\Product::class)
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post"
                                          onsubmit="return confirm('Точно хотите удалить товар?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger w-100 mt-2">Удалить товар
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
