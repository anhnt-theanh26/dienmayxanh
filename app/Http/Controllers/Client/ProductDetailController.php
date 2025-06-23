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
use Artesaos\SEOTools\Facades\SEOTools;
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
        $imageUrl = $product->image ? asset($product->image) : asset('./storage/default.jpg');
        $currentUrl = url()->current();

        SEOTools::setTitle($product->name . ' | ' . config('setting.site_name'));
        $description = \Illuminate\Support\Str::limit(strip_tags($product->description), 160);
        SEOTools::setDescription($description);
        SEOTools::setCanonical($currentUrl);

        SEOTools::opengraph()->setTitle($product->title);
        SEOTools::opengraph()->setDescription($description);
        SEOTools::opengraph()->setUrl($currentUrl);
        SEOTools::opengraph()->addProperty('type', 'article');
        SEOTools::opengraph()->addImage($imageUrl);

        SEOTools::twitter()->setTitle($product->title);
        SEOTools::twitter()->setDescription($description);
        SEOTools::twitter()->setSite('@anhnt_theanh26');
        SEOTools::twitter()->addImage($imageUrl);

        SEOTools::jsonLd()->setType('Article');
        SEOTools::jsonLd()->setTitle($product->title);
        SEOTools::jsonLd()->setDescription($description);
        SEOTools::jsonLd()->setUrl($currentUrl);
        SEOTools::jsonLd()->addImage($imageUrl);

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
