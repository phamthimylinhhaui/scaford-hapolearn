<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'review_id' => $this->faker->randomElement(Review::pluck('id')),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'content' => $this->faker->realText(200, 2),
        ];
    }
}
