<?php

namespace App\Providers;

use App\Models\CategoryParent;
use App\Models\Locationbannermenu;
use App\Models\Locationmenu;
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
            $categoryparents = CategoryParent::get();
            $menus = Locationmenu::where('status', true)->get();
            $bannermenus = Locationbannermenu::where('status', true)->get();
            $view->with([
                'categoryparents' => $categoryparents,
                'menus' => $menus,
                'bannermenus' => $bannermenus,
            ]);
        });
        View::composer('client.page.main.main', function ($view) {
            $categoryparents = CategoryParent::get();
            $menus = Locationmenu::where('status', true)->get();
            $bannermenus = Locationbannermenu::where('status', true)->get();
            $view->with([
                'categoryparents' => $categoryparents,
                'menus' => $menus,
                'bannermenus' => $bannermenus,
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
