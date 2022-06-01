<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::create(['name' => 'Primera', 'product_id' => 1]);
        ProductType::create(['name' => 'Segunda', 'product_id' => 1]);
        ProductType::create(['name' => 'Selecta', 'product_id' => 1]);

        ProductType::create(['name' => 'Film', 'product_id' => 2]);
        ProductType::create(['name' => 'Duro', 'product_id' => 2]);
        ProductType::create(['name' => 'Pet Cristalino', 'product_id' => 2]);
        ProductType::create(['name' => 'Pet Colores', 'product_id' => 2]);

        ProductType::create(['name' => 'Blanco', 'product_id' => 3]);
        ProductType::create(['name' => 'Mixto', 'product_id' => 3]);
        ProductType::create(['name' => 'Couche', 'product_id' => 3]);
        ProductType::create(['name' => 'Periodico', 'product_id' => 3]);
    }
}
