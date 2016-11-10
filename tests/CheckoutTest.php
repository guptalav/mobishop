<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \Cart as Cart;

class CheckoutTest extends TestCase
{
    /** @test */
    public function it_cannot_access_checkout_with_no_products()
    {
        $this->visit('/checkout')
            ->seePageIs('/products')
            ->see('Example Laravel Ecommerce Application')
            ->see('Cart (0)');
    }

    /** @test */
    public function it_can_edit_cart()
    {
        $this->visit('/products/iphone-7')
            ->press('ADD TO CART')
            ->seePageIs('/carts')
            ->see('Item was added to your cart')
            ->see('Cart (1)')
            ->click('Proceed to Checkout')
            ->seePageIs('/checkout')
            ->see('Shipping/Payment')
            ->click('EDIT CART')
            ->seePageIs('/carts');
    }

    /** @test */
    public function it_can_buy()
    {
        $this->withoutEvents();

        $this->visit('/products/iphone-7')
            ->press('ADD TO CART')
            ->seePageIs('/carts')
            ->see('Item was added to your cart')
            ->see('Cart (1)')
            ->click('Proceed to Checkout')
            ->type('test', 'name')
            ->type('test@test.com', 'email')
            ->type('Fake street', 'address')
            ->type('Fake city', 'city')
            ->type('Fake country', 'country')
            ->type('L0J9LI', 'postal')
            ->press('BUY')
            ->see('Success')
            ->see('Cart (0)');
    }

    /** @test */
    public function it_cannot_buy_with_invalid_email()
    {
        $this->visit('/products/iphone-7')
            ->press('ADD TO CART')
            ->seePageIs('/carts')
            ->see('Item was added to your cart')
            ->see('Cart (1)')
            ->click('Proceed to Checkout')
            ->type('test', 'name')
            ->type('testtest.com', 'email')
            ->type('Fake street', 'address')
            ->type('Fake city', 'city')
            ->type('Fake country', 'country')
            ->type('L0J9LI', 'postal')
            ->press('BUY')
            ->see('The email must be a valid email address.');
    }
}
