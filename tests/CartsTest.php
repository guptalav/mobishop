<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \Cart as Cart;

class CartsTest extends TestCase
{
    /** @test */
    public function it_can_load_empty_cart()
    {
        $this->visit('/carts')
            ->see('You have no items in your shopping cart');
    }

    /** @test */
    public function it_can_add_item_to_cart()
    {
        $this->visit('/products/iphone-7')
            ->press('ADD TO CART')
            ->seePageIs('/carts')
            ->see('Item was added to your cart')
            ->see('Cart (1)');
    }

    /** @test */
    public function it_can_remove_item_from_cart()
    {
        $this->visit('/products/iphone-7')
            ->press('ADD TO CART')
            ->seePageIs('/carts')
            ->see('Item was added to your cart')
            ->press('Remove')
            ->see('Item has been removed')
            ->see('Cart (0)');
    }

    /** @test */
    public function it_can_remove_all_items_from_cart()
    {
        $this->visit('/products/iphone-7')
            ->press('ADD TO CART')
            ->seePageIs('/carts')
            ->see('Item was added to your cart')
            ->visit('products/samsung-s7')
            ->press('ADD TO CART')
            ->seePageIs('/carts')
            ->see('Item was added to your cart')
            ->press('Empty Cart')
            ->see('Your cart his been cleared')
            ->see('Cart (0)');
    }

    /** @test */
    public function it_can_update_quantity()
    {
        Cart::add(3, 'Samsung Galaxy S7', 1, 799.99)
            ->associate('\Mobishop\Products\Product');;
        $this->json('PATCH', '/carts/' . Cart::content()->first()->rowId, ['quantity' => 4])
             ->seeStatusCode(200)
             ->seeJson(['success' => true])
             ->assertEquals(4, Cart::content()->first()->qty);
    }

    /** @test */
    public function it_cannot_update_to_invalid_quantity()
    {
        Cart::add(3, 'Samsung Galaxy S7', 1, 799.99)
            ->associate('\Mobishop\Products\Product');;
        $this->json('PATCH', '/carts/' . Cart::content()->first()->rowId, ['quantity' => 8])
             ->seeStatusCode(200)
             ->seeJson(['success' => false])
             ->assertEquals(1, Cart::content()->first()->qty);
    }
}
