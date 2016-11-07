<?php

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            'id' => 1,
            'product_id' => 1,
            'path' => 'images/upload/demo/p/iphone7.jpg',
        ]);

        DB::table('product_images')->insert([
            'id' => 2,
            'product_id' => 2,
            'path' => 'images/upload/demo/p/iphone7plus.jpg',
        ]);

        DB::table('product_images')->insert([
            'id' => 3,
            'product_id' => 3,
            'path' => 'images/upload/demo/p/s7.jpg',
        ]);

        DB::table('product_images')->insert([
            'id' => 4,
            'product_id' => 4,
            'path' => 'images/upload/demo/p/note3.jpg',
        ]);

        DB::table('product_images')->insert([
            'id' => 5,
            'product_id' => 5,
            'path' => 'images/upload/demo/p/pixel.jpg',
        ]);

        DB::table('product_images')->insert([
            'id' => 6,
            'product_id' => 6,
            'path' => 'images/upload/demo/p/pixelxl.jpg',
        ]);

        DB::table('product_images')->insert([
            'id' => 7,
            'product_id' => 7,
            'path' => 'images/upload/demo/p/note5.jpg',
        ]);

        DB::table('product_images')->insert([
            'id' => 8,
            'product_id' => 8,
            'path' => 'images/upload/demo/p/note4.jpg',
        ]);
    }
}
