<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slide>
 */
class SlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
						'title' => fake()->colorName(),
						'image' => fake()->imageUrl(),
						'start_date' => fake()->dateTimeBetween('-1 months', 'now'),
						'end_date' => fake()->dateTimeBetween('-1 months', 'now'),
            //
        ];
    }
}
