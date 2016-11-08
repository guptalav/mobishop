<?php

namespace Mobishop\Http\Middleware;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Cart::count()) {
            return redirect('products');
        }

        return $next($request);
    }
}
