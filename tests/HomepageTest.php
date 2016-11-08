<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomepageTest extends TestCase
{
    /** @test */
    public function it_redirects_home_page_to_products_page()
    {
        $this->visit('/')
             ->seePageIs('/products')
             ->see('Example Laravel Ecommerce Application');
    }
}
