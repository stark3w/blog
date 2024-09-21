<?php

namespace App\Services\Product;


use App\Models\Catalog;
use App\Models\Product;
use App\Models\Tag;


class Service
{
    public function index(string $catalog_slug)
    {
        $catalog = Catalog::where('slug', $catalog_slug)->firstOrFail();
        $products = Product::where('catalog_id', $catalog->id)->paginate(12);

        return compact('products', 'catalog');
    }

    public function create()
    {
        $catalogs = Catalog::all();
        $tags = Tag::all();

        return compact('catalogs', 'tags');
    }

    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $product = Product::create($data);
        $product->tags()->sync($tags);

        return $product;
    }

    public function show($catalog_slug, $product_slug)
    {
        $catalog = Catalog::where('slug', $catalog_slug)->firstOrFail();
        $product = Product::where('slug', $product_slug)->firstOrFail();

        return compact('product', 'catalog');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $catalogs = Catalog::all();
        $tags = Tag::all();

        return compact('product', 'catalogs', 'tags');
    }

    public function update($data, $product)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $product->update($data);
        $product->tags()->sync($tags);

        return $product;
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $catalog = Catalog::findOrFail($product->catalog_id);

        $product->delete();

        return $catalog->slug;
    }


}
