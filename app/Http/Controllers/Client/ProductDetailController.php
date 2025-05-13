<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CategoryParent;
use App\Models\Locationbannermenu;
use App\Models\Locationmenu;
use App\Models\Locationproductmenu;
use App\Models\Product;
use App\Models\Search;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductDetailController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay san pham:');
            return redirect()->route('index');
        }
        $categoryparents = CategoryParent::get();
        $menus = Locationmenu::where('status', true)->get();
        $productmenus = Locationproductmenu::where('status', true)->get();
        $bannermenus = Locationbannermenu::where('status', true)->get();
        return view('client.page.product-detail.main', compact('product', 'categoryparents', 'menus', 'bannermenus'));
    }

}
