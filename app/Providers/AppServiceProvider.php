<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $cart_items = collect([]); // กำหนดค่าเริ่มต้นให้เป็นคอลเลกชันว่าง
    
            if (Auth::check()) {
                $cart_items = Cart::where('user_id', Auth::id())->get();
            }
    
            $view->with('cart_items', $cart_items);
        });
    }
}
