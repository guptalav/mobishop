<?php

namespace Mobishop\Http\Controllers;

use Illuminate\Http\Request;
use Mobishop\Products\Product;

class ProductController extends Controller
{
    /**
     * Show the list of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('active', 1)->get();

        return view('product.index', compact("products"));
    }

    /**
     * Show the product by slug.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where(['slug' => $slug, 'active' => 1])->firstOrFail();

        $attributes = [];
        foreach ($product->attributes as $attribute) {
            $attributes[$attribute->name][$attribute->pivot->value] = $attribute->pivot->value;
        }

        return view('product.show', compact("product", "attributes"));
    }
}
