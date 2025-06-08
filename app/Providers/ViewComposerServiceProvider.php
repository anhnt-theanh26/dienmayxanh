<?php

namespace App\Providers;

use App\Models\CategoryParent;
use App\Models\Locationbannermenu;
use App\Models\Locationmenu;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('layout.client', function ($view) {
            $view->with([
                'categoryparents' => CategoryParent::get(),
                'menus' => Locationmenu::where('status', true)->get(),
                'bannermenus' => Locationbannermenu::where('status', true)->get(),
                'productsSearch' => Product::get(),
                'setting' => Setting::where('status', true)->first(),
            ]);
        });
        View::composer('client.page.main.main', function ($view) {
            $view->with([
                'categoryparents' => CategoryParent::get(),
                'menus' => Locationmenu::where('status', true)->get(),
                'bannermenus' => Locationbannermenu::where('status', true)->get(),
                'productsSearch' => Product::get(),
                'setting' => Setting::where('status', true)->first(),
            ]);
        });
        View::composer('error.client.404', function ($view) {
            $view->with([
                'setting' => Setting::where('status', true)->first(),
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
