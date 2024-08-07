<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'code' => Str::random(10),
                'description' => 'Description for product 1',
                'price' => 100000,
                'unit' => 'piece',
                'discounted_price' => 90000,
                'avatar' => 'avatar1.jpg',
                'stock' => 50,
                'category_id' => 1,
                'size' => json_encode(['S', 'M', 'L']),
                'color' => json_encode(['red', 'blue']),
                'material' => 'cotton',
                'img_path' => 'images/product1/',
                'img_arr' => json_encode(['img1.jpg', 'img2.jpg']),
                'brand_id' => 1,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product 2',
                'code' => str::random(10),
                'description' => 'Description for product 2',
                'price' => 200000,
                'unit' => 'piece',
                'discounted_price' => 180000,
                'avatar' => 'avatar2.jpg',
                'stock' => 20,
                'category_id' => 2,
                'size' => json_encode(['M', 'L', 'XL']),
                'color' => json_encode(['green', 'yellow']),
                'material' => 'polyester',
                'img_path' => 'images/product2/',
                'img_arr' => json_encode(['img3.jpg', 'img4.jpg']),
                'brand_id' => 2,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Product 3',
                'code' => Str::random(10),
                'description' => 'Description for product 3',
                'price' => 150000,
                'unit' => 'piece',
                'discounted_price' => 135000,
                'avatar' => 'avatar3.jpg',
                'stock' => 0,
                'category_id' => 1,
                'size' => json_encode(['L', 'XL', 'XXL']),
                'color' => json_encode(['black', 'white']),
                'material' => 'wool',
                'img_path' => 'images/product3/',
                'img_arr' => json_encode(['img5.jpg', 'img6.jpg']),
                'brand_id' => 1,
                'status' => 'out_of_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
