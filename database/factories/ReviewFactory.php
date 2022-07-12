<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
            'content' => $this->faker->realText(200,3),
            'rate' => $this->faker->numberBetween(1,5),
            'parent_id' => $this->faker->numberBetween(1,500),
        ];
    }
}
