<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompartmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fuel' => 'empty',
            'status' => 'empty',
            'capacity' => $this->faker->numberBetween(5000, 7000),
            'level' => 0,
        ];
    }
}
{

}
