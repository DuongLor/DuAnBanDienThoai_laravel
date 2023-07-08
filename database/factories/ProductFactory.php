<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'category_id' => $this->faker->numberBetween(1, 5),
			'brand_id' => $this->faker->numberBetween(1, 5),
			'name' => $this->faker->name,
			'thumbnail' => $this->faker->imageUrl(640, 480),
			'description' => $this->faker->text,

			'is_active' => $this->faker->boolean(50),
		];
	}
}
