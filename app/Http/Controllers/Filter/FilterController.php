<?php

namespace App\Http\Controllers\Filter;

use Illuminate\Http\Request;

class FilterController extends BaseController
{
    public function index(Request $request)
    {
        $flavors = $request->input('flavors');
        $grades = $request->input('grades');
        $brands = $request->input('brands');

        $products = $this->service->filterFoundProducts($flavors, $grades, $brands);

        return view('search.partials.products-list', compact('products'))->render();
    }
}
