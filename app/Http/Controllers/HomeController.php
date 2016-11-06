<?php

namespace Mobishop\Http\Controllers;

use Illuminate\Http\Request;
use Mobishop\Products\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', compact("products"));
    }
}
