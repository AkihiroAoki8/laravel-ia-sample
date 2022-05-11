<?php

namespace Database\Factories;

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
            // fakerをつかってダミーデータを作成する
            // 書き方はfaker チートシートなどでググる
            'name' => $this->faker->name,
            'user_id' =>  $this->faker->numberBetween(1, 3),
            'is_visible' => $this->faker->boolean
        ];
    }
}
