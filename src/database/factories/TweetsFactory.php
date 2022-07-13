<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TweetsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'    => 1,
            'text'       => $this->faker->realText($maxNbChars = 140, $indexSize = 2),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
