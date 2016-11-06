<?php

namespace Mobishop\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
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

        //save order

        //send email
        
    }
}
