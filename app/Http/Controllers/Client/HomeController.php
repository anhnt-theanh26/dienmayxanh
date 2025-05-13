<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CategoryParent;
use App\Models\Locationbannermenu;
use App\Models\Locationmenu;
use App\Models\Locationproductmenu;
use App\Models\Search;

class HomeController extends Controller
{
    public function index()
    {
        $categoryparents = CategoryParent::get();
        $menus = Locationmenu::where('status', true)->get();
        $productmenus = Locationproductmenu::where('status', true)->get();
        $bannermenus = Locationbannermenu::where('status', true)->get();
        $searchs = Search::limit(40)->get();
        return view("client.page.main.main", compact('categoryparents', 'menus', 'productmenus', 'bannermenus', 'searchs'));
    }

    public function getProduct(string $id)
    {

    }
}
