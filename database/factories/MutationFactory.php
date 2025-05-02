<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mutation>
 */
class MutationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'goods_id' => \App\Models\Goods::factory(),
            'date' => $this->faker->date(),
            'type' => $this->faker->randomElement(['in', 'out']),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
