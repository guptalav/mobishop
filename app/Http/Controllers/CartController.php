<?php

namespace Mobishop\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $search = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->input('id');
        });

        if ($search->count()) {
            return redirect('carts')->withSuccessMessage('Item is already in your cart!');
        }

        Cart::add(
            $request->input('id'),
            $request->input('title'),
            $request->input('quantity'),
            $request->input('price'),
            ($request->input('attributes')) ? $request->input('attributes') : []
        )->associate('\Mobishop\Products\Product');

        return redirect('carts')->withSuccessMessage('Item was added to your cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('carts')->withSuccessMessage('Item has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('carts')->withSuccessMessage('Your cart his been cleared!');
    }
}
