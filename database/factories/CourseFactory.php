<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(640,480),
            'price' => $this->faker->numberBetween(100000,500000),
            'description' => $this->faker->realText(200,3),
        ];
    }
}
