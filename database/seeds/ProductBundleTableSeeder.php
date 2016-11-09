<?php

use Illuminate\Database\Seeder;

class ProductBundleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_bundle')->insert([
            'id' => 1,
            'product_id' => 1,
            'bundle_id' => 1
        ]);

        DB::table('product_bundle')->insert([
            'id' => 2,
            'product_id' => 2,
            'bundle_id' => 1
        ]);

        DB::table('product_bundle')->insert([
            'id' => 3,
            'product_id' => 7,
            'bundle_id' => 2
        ]);

        DB::table('product_bundle')->insert([
            'id' => 4,
            'product_id' => 8,
            'bundle_id' => 2
        ]);
    }
}
