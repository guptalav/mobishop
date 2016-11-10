<?php

namespace Mobishop\Bundles;

class Helper
{
    public static function calculatePrice(Bundle $bundle)
    {
        $price = 0;

        foreach ($bundle->products as $product) {
            $price += $product->price;
        }

        return $price;
    }

    public static function calculateDiscountedPrice(Bundle $bundle)
    {
        $price = self::calculatePrice($bundle);

        $discountedPrice = $price - ($price * $bundle->discount / 100);

        return round($discountedPrice, 2);
    }
}
