<?php

use Illuminate\Database\Seeder;

class ProductAttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_attribute_values')->insert([
            'id' => 1,
            'product_id' => 1,
            'product_attribute_id' => 1,
            'value' => 'Black'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 2,
            'product_id' => 1,
            'product_attribute_id' => 1,
            'value' => 'White'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 3,
            'product_id' => 1,
            'product_attribute_id' => 2,
            'value' => 'Rogers'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 4,
            'product_id' => 1,
            'product_attribute_id' => 2,
            'value' => 'Bell'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 5,
            'product_id' => 2,
            'product_attribute_id' => 1,
            'value' => 'Golden'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 6,
            'product_id' => 2,
            'product_attribute_id' => 1,
            'value' => 'Rose'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 7,
            'product_id' => 4,
            'product_attribute_id' => 2,
            'value' => 'Bell'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 8,
            'product_id' => 4,
            'product_attribute_id' => 2,
            'value' => 'Wind'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 9,
            'product_id' => 6,
            'product_attribute_id' => 2,
            'value' => 'Telus'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 10,
            'product_id' => 6,
            'product_attribute_id' => 2,
            'value' => 'Wind'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 11,
            'product_id' => 6,
            'product_attribute_id' => 1,
            'value' => 'Black'
        ]);

        DB::table('product_attribute_values')->insert([
            'id' => 12,
            'product_id' => 6,
            'product_attribute_id' => 1,
            'value' => 'Rose'
        ]);
    }
}
