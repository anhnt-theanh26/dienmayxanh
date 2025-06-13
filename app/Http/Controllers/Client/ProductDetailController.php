<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CategoryParent;
use App\Models\Locationbannermenu;
use App\Models\Locationmenu;
use App\Models\Locationproductmenu;
use App\Models\Product;
use App\Models\Review;
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
        $reviews = Review::where('product_id', $product->id)->orderByDesc('id')->get();
        return view('client.page.product-detail.main', compact('product', 'reviews'));
    }

    public function review(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $reviews = Review::where('product_id', $product->id)->orderByDesc('id')->get();
        $title = count($reviews) . ' đánh gia ' . $product->name;
        return view('client.page.product-detail.review', compact('product', 'reviews', 'title'));
    }

}
