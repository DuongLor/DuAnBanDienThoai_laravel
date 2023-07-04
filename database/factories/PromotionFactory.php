<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
						'product_id' => $this->faker->numberBetween(1, 5),
						'discount' => $this->faker->numberBetween(1, 100),
						'detail' => $this->faker->text,
						'start_date' => $this->faker->date(),
						'end_date' => $this->faker->dateTimeBetween('now', '+2 months'),
        ];
    }
}
