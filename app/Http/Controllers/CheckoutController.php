<?php

namespace Mobishop\Http\Controllers;

use Illuminate\Http\Request;
use Mobishop\Events\OrderConfirmed;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout.index');
    }

    /**
     * Confirm order and send email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal' => 'required|max:6'
        ]);

        //TODO: save order

        //send email (Passing cart::content for now, ideally order and/or user object must be used here)
        event(new OrderConfirmed($request->get('email'), Cart::content()));
        Cart::destroy();

        return view('checkout.success');
    }
}
