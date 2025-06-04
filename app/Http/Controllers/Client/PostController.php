<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        if (!$post) {
            Alert::error('Không tìm thấy', 'Không tìm thấy bài viết!');
            return redirect()->back();
        }
        $post->increment('view_count');
        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->excerpt ?? '');
        SEOMeta::addMeta('article:published_time', optional($post->published_at)->toW3cString(), 'property');
        SEOMeta::addMeta('article:section', optional($post->category)->name ?? '', 'property');
        SEOMeta::addKeyword(['anhnt', 'anhnt', 'anhnt']);
        OpenGraph::setDescription($post->excerpt ?? '');
        OpenGraph::setTitle($post->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'vi_VN');
        OpenGraph::addProperty('locale:alternate', ['en_US']);
        if (!empty($post->image)) {
            OpenGraph::addImage($post->image);
        }
        if (!empty($post->images) && $post->images->count() > 0) {
            foreach ($post->images as $img) {
                OpenGraph::addImage($img->url);
            }
        }
        OpenGraph::addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);
        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->excerpt ?? '');
        JsonLd::setType('Article');
        if (!empty($post->images) && $post->images->count() > 0) {
            $imageUrls = $post->images->pluck('url')->toArray();
            JsonLd::addImage($imageUrls);
        } elseif (!empty($post->image)) {
            JsonLd::addImage($post->image);
        }
        return view('client.page.post.index', compact('post'));
    }
}
