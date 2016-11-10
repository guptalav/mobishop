<?php

namespace Mobishop\Carts;

use Gloudemans\Shoppingcart\Facades\Cart;

class Helper
{
    public static function add($item)
    {
        if ($item['attributes']['type'] == 'product') {
            $model = '\Mobishop\Products\Product';
        } else {
            $model = '\Mobishop\Bundles\Bundle';
        }

        Cart::add(
            $item['id'],
            $item['title'],
            $item['quantity'],
            $item['price'],
            $item['attributes']
        )->associate($model);
    }
}
