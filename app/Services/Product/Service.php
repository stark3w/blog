<?php

namespace App\Services\Product;


use App\Models\Product;

class Service
{
    public function store($data) {
        $tags = $data['tags'];
        unset($data['tags']);

        $product = Product::create($data);
        $product->tags()->sync($tags);
    }

    public function update($data, $product) {
        $tags = $data['tags'];
        unset($data['tags']);

        $product->update($data);

        $product->tags()->sync($tags);
    }


}
