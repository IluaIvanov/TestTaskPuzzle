<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->streetName(),
            'total_cost' => $this->faker->randomNumber(),
            'address' => $this->faker->address()
        ];
    }
}
