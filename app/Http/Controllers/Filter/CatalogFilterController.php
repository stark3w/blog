<?php

namespace App\Http\Controllers\Filter;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogFilterController extends Controller
{
    public function index(Request $request)
    {
        $flavors = $request->input('flavors');
        $grades = $request->input('grades');
        $brands = $request->input('brands');
        $catalogId = $request->input('catalog_id');

        $products = Product::query()
            ->where('catalog_id', $catalogId)
            ->when(is_array($flavors) && count($flavors), function ($query) use ($flavors)
            {
                return $query->whereIn('flavor_id', $flavors);
            })
            ->when(is_array($grades) && count($grades), function ($query) use ($grades)
            {
                return $query->whereIn('grade_id', $grades);
            })
            ->when(is_array($brands) && count($brands), function ($query) use ($brands)
            {
                return $query->whereIn('brand_id', $brands);
            })
            ->get();

        return view('search.partials.products-list', compact('products'))->render();
    }
}
