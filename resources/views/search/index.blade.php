@extends('layouts.app')
@section('title','Product - iCATCH')

@section('content')
    @vite('resources/js/filters/filters.js')
    <div class="container py-4">
        <div class="row justify-content-center">
            @include('search.partials.filters')

            @include('search.partials.products-list')
        </div>
    </div>
@endsection

