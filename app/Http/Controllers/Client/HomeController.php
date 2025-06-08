<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\CategoryParent;
use App\Models\Locationbannermenu;
use App\Models\Locationmenu;
use App\Models\Locationproductmenu;
use App\Models\Search;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function index()
    {
        $productmenus = Locationproductmenu::where('status', true)->get();
        $searchs = Search::limit(40)->orderByDesc('id')->get();
        $setting = Setting::where('status', true)->first();
        $seoProducts = null;
        if ($setting->seo_products) {
            $seoProducts = json_decode($setting->seo_products, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $seoProducts = null;
            }
        }
        $pageTitle = config('app.name');
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
        return view("client.page.main.main", compact('productmenus', 'searchs'));
    }

    public function getProduct(string $id) {}
}
