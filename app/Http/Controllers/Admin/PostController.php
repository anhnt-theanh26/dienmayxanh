<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.page.post.index', compact('posts'));
        // if (Auth::user()->can('index post')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.page.post.create', compact('categories'));
        // if (Auth::user()->can('create post')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|url|max:255',
            'published_at' => 'required|date',
            'is_hot' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
            'user_id' => 'nullable|exists:users,id',
        ]);
        try {
            $originalSlug = Str::slug($request->title);
            $slug = $originalSlug;
            $count = 1;
            while (Post::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $data = [
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'content' => $request->content,
                'slug' => $slug,
                'image' => $request->image,
                'view_count' => 0,
                'is_hot' => $request->has('is_hot') ? true : false,
                'status' => $request->status,
                'published_at' => $request->published_at,
                'category_id' => $request->category_id,
                'user_id' => Auth::user()->id,
            ];
            Post::create($data);
            Alert::success('Thanh cong', 'Them moi bai viet thanh cong');
            return redirect()->route('admin.post.index')->with('success', 'Thêm mới danh mục thành công');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.post.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $post = Post::where('id', $id)->first();
            $categories = Category::orderBy('id', 'desc')->get();
            if (!$post) {
                Alert::error('Khong tim thay bai viet:');
                return redirect()->route('admin.post.index')->with('error', 'Khong tim thay bai viet');
            }
            return view('admin.page.post.edit', compact('categories', 'post'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.post.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|url|max:255',
            'published_at' => 'required|date',
            'is_hot' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
            'user_id' => 'nullable|exists:users,id',
        ]);
        try {
            $post = Post::where('id', $id)->first();
            if (!$post) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay bai viet');
                return redirect()->route('admin.post.index')->with('error', 'Khong tim thay bai viet!');
            }
            $originalSlug = Str::slug($request->title);
            $newSlug = $originalSlug;
            $count = 1;
            while (Post::where('slug', $newSlug)->where('id', '!=', $post->id)->exists()) {
                $newSlug = $originalSlug . '-' . $count++;
            }
            $request->merge([
                'slug' => $newSlug
            ]);
            $data = [
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'content' => $request->content,
                'slug' => $newSlug,
                'image' => $request->image,
                'view_count' => 0,
                'is_hot' => $request->has('is_hot') ? true : false,
                'status' => $request->status,
                'published_at' => $request->published_at,
                'category_id' => $request->category_id,
                'user_id' => 1,
            ];
            $post->update($data);
            if ($post->update($data)) {
                Alert::success('Thanh cong', 'Cap nhap bai viet thanh cong');
            }
            return redirect()->route('admin.post.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.post.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $post = Post::onlyTrashed()->where('id', $id)->first();
            if (!$post) {
                Alert::error('Khong thay bai viet', 'Bai viet khong ton tai');
                return redirect()->route('admin.post.index')->with('error', 'Khong tim thay bai viet!');
            }
            $post->forceDelete();
            Alert::success('Thanh cong', 'Xoa vinh vien bai viet thanh cong');
            return redirect()->route('admin.post.index')->with('success', 'Xoa bai viet thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.post.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $post = Post::where('id', $id)->first();
            if (!$post) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay bai viet');
                return redirect()->route('admin.post.index')->with('error', 'Khong tim thay bai viet!');
            }
            $post->delete();
            Alert::success('Thanh cong', 'Xoa bai viet thanh cong');
            return redirect()->route('admin.post.index')->with('success', 'Xoa bai viet thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.post.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function deleted()
    {
        $posts = Post::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('admin.page.post.restore', compact('posts'));
    }

    public function restore(string $id)
    {
        try {
            $post = Post::withTrashed()->where("id", $id)->first();
            if (!$post) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay bai viet');
                return redirect()->route('admin.post.index')->with('error', 'Khong tim thay bai viet!');
            }
            $post->restore();
            Alert::success('Thanh cong', 'Khoi phuc bai viet thanh cong');
            return redirect()->route('admin.post.index')->with('success', 'Khoi phuc bai viet thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.post.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function search(Request $request, string $keyword)
    {
        $status = $request->status;
        if ($status == 'index') {
            $results = Post::where('title', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Post::orderBy('id', 'desc')->get();
            }
        }
        if ($status == 'delete') {
            $results = Post::onlyTrashed()->where('title', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Post::onlyTrashed()->orderBy('id', 'desc')->get();
            }
        }
        return view('admin.page.post.search', compact('results', 'status'));
    }
}
