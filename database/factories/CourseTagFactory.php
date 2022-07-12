<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => $this->faker->randomElement(Tag::pluck('id')),
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
        ];
    }
}
