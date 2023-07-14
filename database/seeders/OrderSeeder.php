<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//
		$orders = Order::factory()->count(5)->create();

		foreach ($orders as $order) {
			// Lấy ngẫu nhiên 5 sản phẩm
			$products = Product::inRandomOrder()->limit(5)->get();
			foreach ($products as $product) {
				// Tạo giá trị ngẫu nhiên cho quantity và price
				$quantity = random_int(1, 10);
				// random number
				$unit_price = random_int(100, 1000);
				$discount_price = random_int(100, 1000);
				// Gán các sản phẩm discount_price, unit_price
				$color_id = random_int(1, 10);
				$order->products()->attach($product, ['quantity' => $quantity, 'unit_price' => $unit_price, 'discount_price' => $discount_price,'color_id' => $color_id]);
			}
		}
	}
}
