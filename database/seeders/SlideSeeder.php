<?php

namespace Database\Seeders;

use App\Models\Slide;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                $slides = Slide::factory()->count(5)->create();

                foreach ($slides as $slide) {
                    // Lấy ngẫu nhiên 3 sản phẩm
                    $products = Product::inRandomOrder()->limit(3)->get();
        
                    // Gán các sản phẩm cho slide
                    $slide->products()->attach($products);
                }
    }
}
