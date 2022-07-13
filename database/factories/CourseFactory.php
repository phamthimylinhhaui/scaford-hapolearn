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
            'image' => $this->faker->imageUrl(640, 480),
            'description' => $this->faker->realTextText(200, 2),
            'price' => $this->faker->numberBetween(5000, 50000)
        ];
    }
}
