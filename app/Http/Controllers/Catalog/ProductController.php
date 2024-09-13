<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(12);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('products.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product, string $id)
    {
        $data = $request->validated();

        $this->service->update($data,$product);


        return view('products.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id->delete();

        return redirect()->route('products.index');
    }
}
