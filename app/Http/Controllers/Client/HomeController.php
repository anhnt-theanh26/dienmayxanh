<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CategoryParent;
use App\Models\Locationmenu;
use App\Models\Locationproductmenu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categoryparents = CategoryParent::get();
        $menus = Locationmenu::where('status', true)->get();
        $productmenus = Locationproductmenu::where('status', true)->get();
        return view("client.page.main.main", compact('categoryparents', 'menus', 'productmenus'));
    }

    public function getProduct(string $id){
        
    }
}
