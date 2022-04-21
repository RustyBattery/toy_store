<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\ProductManufacturer;
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
    public function definition()
    {
        return [
            'name' => $this->faker->text(32),
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(),
            'article' => $this->faker->password,
            'manufacturer_id' => ProductManufacturer::get()->random()->id,
            'manufacturer_country' => $this->faker->country,
            'material' => $this->faker->word,
            'weight' => round(random_int(100, 1000)/100, 2),
            'price' => round(random_int(100, 100000000)/100, 2),
            'category_id' => ProductCategory::get()->random()->id,
        ];
    }
}
