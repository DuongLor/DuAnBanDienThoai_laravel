<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $colors = Color::factory()->count(10)->create();

        foreach ($colors as $color) {
            // Lấy ngẫu nhiên 3 sản phẩm
            $products = Product::inRandomOrder()->limit(3)->get();
$price = random_int(100, 1000);
$quantity = random_int(1, 10);
            // Gán màu sắc cho các sản phẩm
            $color->products()->attach($products,['price' => $price, 'quantity' => $quantity]);
        }
                
    }
}
