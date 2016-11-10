<?php

namespace Mobishop\Http\Controllers;

use Illuminate\Http\Request;
use Mobishop\Bundles\Bundle;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bundles = Bundle::where('active', 1)->get();

        return view('bundle.index', compact("bundles"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $bundle = Bundle::where(['slug' => $slug, 'active' => 1])->firstOrFail();

        return view('bundle.show', compact("bundle"));
    }
}
