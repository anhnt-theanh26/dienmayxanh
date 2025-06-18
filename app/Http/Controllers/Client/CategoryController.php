<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $results = Product::join('categories', 'categories.id', '=', 'products.category_id')->where('categories.slug', $slug)->select('products.*')->get();
        $style = 'category';
        $keyword = $slug;
        $setting = Setting::where('status', true)->first();
        $category = Category::where('slug', $slug)->first();
        $seoProducts = null;
        if ($setting->seo_products) {
            $seoProducts = json_decode($setting->seo_products, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $seoProducts = null;
            }
        }
        if ($category) {
            $pageTitle = $category->name . ' | ' . config('setting.site_name');
        } else if ($seoProducts['title_products']) {
            $pageTitle = $seoProducts['title_products'];
        } else {
            $pageTitle = config('setting.site_name');
        }
        $pageDescription = $seoProducts['description_products'] ?? '';
        $pageRobots = $seoProducts['robots_products'] ?? 'index, follow';
        $pageImage = $seoProducts['seoimage_products'] ?? asset('./storage/default.jpg');

        SEOTools::setTitle($pageTitle);
        SEOTools::setDescription($pageDescription);
        SEOTools::setCanonical(url()->current());

        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->setTitle($pageTitle);
        SEOTools::opengraph()->setDescription($pageDescription);
        SEOTools::opengraph()->addProperty('type', 'website');

        SEOTools::twitter()->setTitle($pageTitle);
        SEOTools::twitter()->setDescription($pageDescription);
        SEOTools::twitter()->setSite('@anhnt_theanh26');

        SEOTools::jsonLd()->setType('WebPage');
        SEOTools::jsonLd()->setTitle($pageTitle);
        SEOTools::jsonLd()->setDescription($pageDescription);
        SEOTools::jsonLd()->setUrl(url()->current());
        return view('client.page.search.index', compact('results', 'style', 'keyword'));
    }
}
