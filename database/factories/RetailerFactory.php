<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RetailerFactory extends Factory
{

    public function definition()
    {
        // TODO: Implement definition() method.
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'ulp_93' => $this->faker->numberBetween(3000, 50000),
            'ulp_95' => $this->faker->numberBetween(3000, 50000),
            'diesel' => $this->faker->numberBetween(3000, 80000),
            'ulp_93_tank' => 50000,
            'ulp_95_tank' => 50000,
            'diesel_tank' => 80000,
            'ulp_93_demand_per_day' => $this->faker->numberBetween(400, 5000),
            'ulp_95_demand_per_day' => $this->faker->numberBetween(400, 5000),
            'diesel_demand_per_day' => $this->faker->numberBetween(400, 5000),
        ];
    }
}
