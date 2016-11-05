<?php

namespace Mobishop\Products;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'product_attributes';

    /**
     * The products that belongs to the attribute.
     */

    public function products()
    {
        return $this->belongsToMany('Mobishop\Products\Product', 'product_attribute_values')
            ->withPivot('value')
            ->withTimestamps();
    }
}
