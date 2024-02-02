<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'name' => "Apple",
                'slug' => Str::slug("Apple"),
            ],
            [
                'name' => "Orange",
                'slug' => Str::slug("Orange"),
            ]
        ]);
    }
}
