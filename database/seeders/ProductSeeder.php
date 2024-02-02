<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                "name" => "Vietnam small apple",
                "unit" => "Pcs",
                "slug" => Str::slug('Vietnam small apple'),
                "price" => 2,
                "cat_id" => 1,
            ],
            [
                "name" => "China big apple",
                "unit" => "pack",
                "slug" => Str::slug('China big apple'),
                "price" => 8,
                "cat_id" => 1,
            ],
            [
                "name" => "Vietnam big orange",
                "slug" => Str::slug('Vietnam big orange'),
                "unit" => "Kg",
                "price" => 5,
                "cat_id" => 2,
            ]
        ]);
    }
}
