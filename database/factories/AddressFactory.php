<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
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
						'name' => $this->faker->name,
						'phone' => $this->faker->phoneNumber,
						'address' => $this->faker->address
        ];
    }
}
