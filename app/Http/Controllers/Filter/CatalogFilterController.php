<?php

namespace App\Http\Controllers\Filter;

use Illuminate\Http\Request;

class CatalogFilterController extends BaseController
{
    public function index(Request $request)
    {
        $flavors = $request->input('flavors');
        $grades = $request->input('grades');
        $brands = $request->input('brands');
        $catalogId = $request->input('catalog_id');

        $products = $this->service->filterCatalogProducts($flavors, $grades, $brands, $catalogId);

        return view('search.partials.products-list', compact('products'))->render();
    }
}
