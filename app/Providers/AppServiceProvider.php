<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['header','page.order'], function ($view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with([
                    'cart' => Session::get('cart'),
                    'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice,
                    'totalQty' => $cart->totalQty
                ]);
            }
        });

//        view()->composer(['header','page.order'],function($view){});
    }
}
