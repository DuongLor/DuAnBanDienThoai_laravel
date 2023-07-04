<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
						'user_id' => $this->faker->numberBetween(1, 5),
						'payment_method_id' => $this->faker->numberBetween(1, 5),
						'order_date' => $this->faker->dateTimeBetween('now', '+2 months'),
						'total_amount' => $this->faker->numberBetween(1, 100),
						'contact_information' => $this->faker->text,
						'status' => 'pending',
        ];
    }
}
