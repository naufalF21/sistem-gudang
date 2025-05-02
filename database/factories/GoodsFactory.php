<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class GoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => \App\Models\Category::factory(),
            'name' => $this->faker->word(),
            'code' => $this->faker->unique()->word(),
            'location' => $this->faker->word(),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement(['active', 'non-active']),
            'min_stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
