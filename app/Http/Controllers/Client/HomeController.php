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
        $productmenus = Locationproductmenu::where('status', true)->get();
        $searchs = Search::limit(40)->get();
        return view("client.page.main.main", compact('productmenus', 'searchs'));
    }

    public function getProduct(string $id)
    {

    }
}
