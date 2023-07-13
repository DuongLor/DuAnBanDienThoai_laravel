<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentMethod>
 */
class PaymentMethodFactory extends Factory
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
			'type' => $this->faker->name,
			'name' => $this->faker->name,
			'credit_card' => $this->faker->randomNumber(10),
			'expiration_date' => $this->faker->date(),
			'cvv' => $this->faker->randomNumber(2),
		];
	}
}
