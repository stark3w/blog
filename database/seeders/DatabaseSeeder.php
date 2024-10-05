<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Flavor;
use App\Models\Grade;
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

        Brand::factory(3)->create();
        Flavor::factory(3)->create();
        Grade::factory(3)->create();

        Product::factory(12)->create()->each(function ($product) {

            $tags = Tag::inRandomOrder()->take(rand(1, 20))->pluck('id');

            $product->tags()->sync($tags);
        });


    }
}
