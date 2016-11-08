<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductsTest extends TestCase
{
    /** @test */
    public function it_loads_the_products_page()
    {
        $this->visit('/products')
            ->see('Example Laravel Ecommerce Application')
            ->see('iPhone 7');
    }

    /** @test */
    public function it_loads_the_specific_product_page()
    {
        $this->visit('/products')
            ->click('iPhone 7')
            ->seePageIs('/products/iphone-7');
    }

    /** @test */
    public function it_cannot_load_invalid_product_page()
    {
        $this->get('/products/invalid-prod')
            ->seeStatusCode(404);
    }
}
