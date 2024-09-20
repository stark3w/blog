<?php

namespace App\Services\Product;


use App\Models\Product;
use Illuminate\Http\Request;

class Service
{
//    public function index($catalogId)
//    {
//        return Product::when($catalogId, function ($query) use ($catalogId)
//        {
////            return $query->where('catalog_id', $catalogId);
//        })->paginate(12);
//    }

    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $product = Product::create($data);
        $product->tags()->sync($tags);
        return $product;
    }

    public function update($data, $product)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $product->update($data);

        $product->tags()->sync($tags);
    }


}
