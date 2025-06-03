<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
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
        return view('client.page.post.index', compact('post'));
    }
}
