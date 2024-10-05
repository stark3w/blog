<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Flavor;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'catalog_id' => Catalog::get()->random()->id,
            'brand_id' => Brand::get()->random()->id,
            'flavor_id' => Flavor::get()->random()->id,
            'grade_id' => Grade::get()->random()->id,
            'price' => $this->faker->numberBetween(1000, 999999),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
