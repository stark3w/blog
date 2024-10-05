<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Flavor;
use App\Models\Grade;
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

        $flavors = Flavor::withCount('products')->get();
        $grades = Grade::withCount('products')->get();
        $brands = Brand::withCount('products')->get();

        return view('search.index', compact('products', 'flavors', 'brands', 'grades'));
    }

    public function show($product_slug)
    {
        $product = Product::where('slug', $product_slug)->firstOrFail();

        return view('products.show', compact('product'));
    }
}
