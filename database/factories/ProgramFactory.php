<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
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
            'lesson_id' => $this->faker->randomElement(Lesson::pluck('id')),
            'path' => $this->faker->text(200),
            'type' => $this->faker->text(200),
        ];
    }
}
