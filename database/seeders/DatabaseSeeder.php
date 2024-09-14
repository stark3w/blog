<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Catalog::factory(5)->create();
        Tag::factory(20)->create();
        Product::factory(12)->create()->each(function ($product) {

            $tags = Tag::inRandomOrder()->take(rand(1, 20))->pluck('id');

            $product->tags()->sync($tags);
        });

    }
}
