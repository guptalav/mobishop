<?php

namespace Mobishop\Products;

class Helper
{
    public static function getImagePath(Product $product)
    {
        if (!empty($product->images()->first()) && file_exists(public_path($product->images->first()->path))) {
            return $product->images->first()->path;
        }
            
        return 'images/upload/p/default.png';
    }
}
