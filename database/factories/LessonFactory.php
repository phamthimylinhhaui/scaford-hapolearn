<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
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
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
            'image' => $this->faker->imageUrl(640, 480),
            'times' => $this->faker->time('H:i:s'),
            'description' => $this->faker->realText(200, 2),
            'document' => $this->faker->realText(200, 2),
            'requirement' => $this->faker->realText(200, 2),
        ];
    }
}
