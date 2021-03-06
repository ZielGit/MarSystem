<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Cartón'
        ]);

        Product::create([
            'name' => 'Plástico'
        ]);

        Product::create([
            'name' => 'Papel'
        ]);
    }
}
