<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'キウイ',
            'price' => 800,
            'image' => 'kiwi.png',
            'description' => '甘みと酸味のバランスが抜群のキウイです。',
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'image' => 'strawberry.png',
            'description' => 'ジューシーで甘いイチゴです。',
        ]);
    }
}
