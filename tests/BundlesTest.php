<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BundlesTest extends TestCase
{
    /** @test */
    public function it_loads_the_bundles_page()
    {
        $this->visit('/bundles')
            ->see('Buy bundles at discounted price')
            ->see('iOS Bundle');
    }

    /** @test */
    public function it_loads_the_specific_bundle_page()
    {
        $this->visit('/bundles')
            ->click('iOS Bundle')
            ->seePageIs('/bundles/ios-bundle');
    }

    /** @test */
    public function it_cannot_load_invalid_bundle_page()
    {
        $this->get('/bundles/invalid-bundle1')
            ->seeStatusCode(404);
    }
}
