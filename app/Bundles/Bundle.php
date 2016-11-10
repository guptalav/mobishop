<?php

namespace Mobishop\Bundles;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'bundles';

    /**
     * The products that belongs to the bundle.
     */
    public function products()
    {
        return $this->belongsToMany('Mobishop\Products\Product', 'product_bundle');
    }
}
