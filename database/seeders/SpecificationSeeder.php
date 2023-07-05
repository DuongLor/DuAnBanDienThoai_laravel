<?php

namespace Database\Seeders;

use App\Models\Specification;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
				Specification::factory()->count(5)->create();
    }
}
