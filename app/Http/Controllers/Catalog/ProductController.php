<?php

namespace App\Http\Controllers\Catalog;


use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Catalog;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($catalog_slug)
    {
        $catalog = Catalog::where('slug', $catalog_slug)->firstOrFail();

        $products = Product::where('catalog_id', $catalog->id)->paginate(12);

        return view('products.index', compact('products', 'catalog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Product::class);

        $catalogs = Catalog::all();

        $tags = Tag::all();

        return view('products.create', compact('catalogs', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        Gate::authorize('create', Product::class);

        $data = $request->validated();

       $product = $this->service->store($data);

       $catalog = Catalog::findOrFail($product->catalog_id);


        return redirect()->route('products.show', [
            'product_slug' => $product->slug,
            'catalog_slug' => $catalog->slug
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show($catalog_slug, $product_slug)
    {
        $catalog = Catalog::where('slug', $catalog_slug)->firstOrFail();

        $product  = Product::where('slug', $product_slug)->firstOrFail();

        return view('products.show', compact('product', 'catalog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('update', Product::class);

        $product = Product::findOrFail($id);

        $catalogs = Catalog::all();

        $tags = Tag::all();

        return view('products.edit', compact('product', 'catalogs', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {
        Gate::authorize('update', Product::class);

        $data = $request->validated();

        $this->service->update($data,$product);


        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('delete', Product::class);

        $product = Product::findOrFail($id);

        $catalog = Catalog::findOrFail($product->catalog_id);

        $product->delete();

        return redirect()->route('products.index', ['catalog_slug' => $catalog->slug]);
    }
}
