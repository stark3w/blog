<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(12);


        return view('products.search.index', compact('products'));
    }

    public function show($product_slug)
    {
        $product = Product::where('slug', $product_slug)->firstOrFail();

        return view('products.show', compact('product'));
    }
}
