<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductAttributesTableSeeder::class);
        $this->call(ProductAttributeValuesTableSeeder::class);
        $this->call(ProductImagesTableSeeder::class);
        $this->call(BundlesTableSeeder::class);
        $this->call(ProductBundleTableSeeder::class);
    }
}
