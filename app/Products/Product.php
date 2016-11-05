<?php

namespace Mobishop\Products;

use Illuminate\Database\Eloquent\Model;
use Mobishop\Products\ProductAttribute;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'products';

    /**
     * The attributes that belongs to the product.
     */

    public function attributes()
    {
        return $this->belongsToMany('Mobishop\Products\ProductAttribute', 'product_attribute_values')
            ->withPivot('value');
    }

    /**
     * The images that belongs to the product.
     */

    public function images()
    {
        return $this->hasMany('Mobishop\Products\ProductImage');
    }
}
