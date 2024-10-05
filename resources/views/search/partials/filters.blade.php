<div class="col-md-3">
    <div class="mb-4">
        <h5>Цена</h5>
        <input type="range" class="form-range" min="0" max="500" step="10">
    </div>
    <div class="mb-4">
        <h5>Вкус чая</h5>
        @foreach($flavors as $flavor)
            <div class="mt-2">
                <input class="form-check-input" type="checkbox" value="{{ $flavor->id }}"
                       id="flavor{{ $flavor->id }}">
                <label class="form-check-label" for="flavor{{ $flavor->id }}">
                    {{ $flavor->name }} <small>({{ $flavor->products_count }})</small>
                </label>
            </div>
        @endforeach
    </div>
    <div class="mb-4">
        <h5>Сорт чая</h5>
        @foreach($grades as $grade)
            <div class="mt-2">
                <input class="form-check-input" type="checkbox" value="{{ $grade->id }}"
                       id="grade{{ $grade->id }}">
                <label class="form-check-label" for="grade{{ $grade->id }}">
                    {{ $grade->name }} <small>({{ $grade->products_count }})</small>
                </label>
            </div>
        @endforeach
    </div>
    <div class="mb-4">
        <h5>Бренд чая</h5>
        @foreach($brands as $brand)
            <div class="mt-2">
                <input class="form-check-input" type="checkbox" value="{{ $brand->id }}"
                       id="brand{{ $brand->id }}">
                <label class="form-check-label" for="brand{{ $brand->id }}">
                    {{ $brand->name }} <small>({{ $brand->products_count }})</small>
                </label>
            </div>
        @endforeach
    </div>
</div>
