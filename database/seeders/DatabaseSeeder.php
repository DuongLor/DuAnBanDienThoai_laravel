<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Image;
use App\Models\Order;
use App\Models\ProductColor;
use App\Models\ProductOder;
use App\Models\SlideProduct;
use App\Models\Specification;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();
		$this->call([
			// chaỵ đầu
			BrandSeeder::class,

			UserSeeder::class,
			ProductSeeder::class,
			PaymentMethodSeeder::class,

			// chạy sau
			ReviewSeeder::class,
			SpecificationSeeder::class,
			ImageSeeder::class,
			OrderSeeder::class,
			ColorSeeder::class,
			SlideSeeder::class,
			AddressSeeder::class,

			//tự faker 3 bảng chung là product_order , product_color , slide_product
		]);
	}
}
