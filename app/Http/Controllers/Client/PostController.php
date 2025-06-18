<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Productmenu;
use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Artesaos\SEOTools\Facades\SEOTools;

class PostController extends Controller
{
    public function index(Request $request, string $slug)
    {
        $posts = Productmenu::where('slug', $slug)->first();
        $setting = Setting::where('status', true)->first();

        $seoPosts = null;
        if ($setting) {
            if ($setting->seo_posts) {
                $seoPosts = json_decode($setting->seo_posts, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $seoPosts = null;
                }
            }
        }
        $pageTitle = $seoPosts['title_posts'] ?? $posts->name . ' | ' . config('setting.site_name');
        $pageDescription = $seoPosts['description_posts'] ?? 'Cập nhật những bài viết mới nhất về chủ đề ' . $posts->name;
        $pageRobots = $seoPosts['robots_posts'] ?? 'index, follow';
        $pageImage = $seoPosts['seoimage_posts'] ?? asset('./storage/default.jpg');

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
        return view('client.page.post.index', compact('posts', 'setting'));
    }

    public function show(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $setting = Setting::where('status', true)->first();

        if (!$post) {
            Alert::error('Không tìm thấy', 'Không tìm thấy bài viết!');
            return redirect()->back();
        }

        $post->increment('view_count');

        $imageUrl = $post->image ? asset($post->image) : asset('./storage/default.jpg');
        $currentUrl = url()->current();

        SEOTools::setTitle($post->title . ' | ' . config('setting.site_name'));
        $description = $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 160);
        SEOTools::setDescription($description);
        SEOTools::setCanonical($currentUrl);

        SEOTools::opengraph()->setTitle($post->title);
        SEOTools::opengraph()->setDescription($description);
        SEOTools::opengraph()->setUrl($currentUrl);
        SEOTools::opengraph()->addProperty('type', 'article');
        SEOTools::opengraph()->addImage($imageUrl);

        SEOTools::twitter()->setTitle($post->title);
        SEOTools::twitter()->setDescription($description);
        SEOTools::twitter()->setSite('@anhnt_theanh26');
        SEOTools::twitter()->addImage($imageUrl);

        SEOTools::jsonLd()->setType('Article');
        SEOTools::jsonLd()->setTitle($post->title);
        SEOTools::jsonLd()->setDescription($description);
        SEOTools::jsonLd()->setUrl($currentUrl);
        SEOTools::jsonLd()->addImage($imageUrl);

        return view('client.page.post.show', compact('post', 'setting'));
    }

    public function category(Request $request, string $slug)
    {
        $categoryPosts = Category::where('slug', $slug)->first();
        $setting = Setting::where('status', true)->first();

        $seoPosts = null;
        if ($setting) {
            if ($setting->seo_posts) {
                $seoPosts = json_decode($setting->seo_posts, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $seoPosts = null;
                }
            }
        }
        $pageTitle = $seoPosts['title_posts'] ?? $categoryPosts->name . ' | ' . config('setting.site_name');
        $pageDescription = $seoPosts['description_posts'] ?? 'Cập nhật những bài viết mới nhất về chủ đề ' . $categoryPosts->name;
        $pageRobots = $seoPosts['robots_posts'] ?? 'index, follow';
        $pageImage = $seoPosts['seoimage_posts'] ?? asset('./storage/default.jpg');

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
        return view('client.page.post.index', compact('categoryPosts', 'setting'));
    }
}
