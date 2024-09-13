@extends('layouts.app')
@section('title', 'Catalog products - iCATCH')

@section('content')
    <div class="container py-4">
    <div class="row row-cols-1 row-cols-md-2 g-4  justify-content-center">
        @foreach($catalogs as $catalog)
        <div class="col">
            <a href="{{ route('product.index') }}" class="text-decoration-none">
            <div class="card h-100 d-flex flex-column hover-scale">
                <img src="{{ $catalog->image }}" class="card-img-top" style="max-width: 634px; max-height: 140px; object-fit: cover;" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $catalog->name }}</h5>
                    <p class="card-text">{{ $catalog->description }}</p>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
    </div>
    <div>
        {{ $catalogs->links() }}
    </div>
@endsection
