<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.page.category.index', compact('categories'));
        // if (Auth::user()->can('index category')) {
        // } else {
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
        return view('admin.page.category.create', compact('categoryParents'));
        // if (Auth::user()->can('create category')) {
        // } else {
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'image' => 'nullable|url|max:255',
                'is_hot' => 'nullable',
                'category_parent_id' => 'required|exists:category_parents,id',
            ]);
            $originalSlug = Str::slug($request->name);
            $slug = $originalSlug;
            $count = 1;
            while (Category::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $request->merge(['slug' => $slug]);
            $data = [
                'name' => $request->name,
                'slug' => $slug,
                'is_hot' => $request->has('is_hot') ? true : false,
                'category_parent_id' => $request->category_parent_id,
                'image' => $request->images,
            ];

            Category::create($data);
            Alert::success('Thanh cong', 'Them moi danh muc thanh cong');
            return redirect()->route('admin.category.index')->with('success', 'Thêm mới danh mục thành công');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('index store')) {
        // } else {
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->can('show category')) {
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
            $category = Category::where('id', $id)->first();
            return view('admin.page.category.edit', compact('category', 'categoryParents'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('edit category')) {
        // } else {
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $category = Category::where('id', $id)->first();
            if (!$category) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay danh muc');
                return redirect()->route('admin.category.index')->with('error', 'Khong tim thay danh muc!');
            }
            $originalSlug = Str::slug($request->name);
            $newSlug = $originalSlug;
            $count = 1;
            while (
                Category::where('slug', $newSlug)->where('id', '!=', $category->id)->exists()
            ) {
                $newSlug = $originalSlug . '-' . $count++;
            }
            $request->merge([
                'slug' => $newSlug
            ]);
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
                'image' => 'nullable|url|max:255',
                'is_hot' => 'nullable',
                'category_parent_id' => 'required|exists:category_parents,id',
            ]);
            $data = [
                'name' => $request->name,
                'slug' => $newSlug,
                'is_hot' => $request->has('is_hot') ? true : false,
                'category_parent_id' => $request->category_parent_id,
            ];
            if ($request->images) {
                $data['image'] = $request->images;
            }
            $category->update($data);
            return redirect()->route('admin.category.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('update category')) {
        // } else {
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::onlyTrashed()->where('id', $id)->first();
            if (!$category) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay danh muc');
                return redirect()->route('admin.category.index')->with('error', 'Khong tim thay danh muc!');
            }
            $category->forceDelete();
            if (!empty($category->image)) {
                $oldImagePath = public_path($category->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            return redirect()->route('admin.category.index')->with('success', 'Xoa danh muc thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('destroy category')) {
        // } else {
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function delete(string $id)
    {
        try {
            $category = Category::where('id', $id)->first();
            if (!$category) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay danh muc');
                return redirect()->route('admin.category.index')->with('error', 'Khong tim thay danh muc!');
            }
            $category->delete();
            return redirect()->route('admin.category.index')->with('success', 'Xoa danh muc thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('delete category')) {
        // } else {
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function deleted()
    {
        $categories = Category::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('admin.page.category.restore', compact('categories'));
        // if (Auth::user()->can('deleted category')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function restore(string $id)
    {
        try {
            $category = Category::withTrashed()->where("id", $id)->first();
            if (!$category) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay danh muc');
                return redirect()->route('admin.category.index')->with('error', 'Khong tim thay danh muc!');
            }
            $category->restore();
            return redirect()->route('admin.category.index')->with('success', 'Khoi phuc danh muc thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('restore category')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function search(Request $request, string $keyword)
    {
        $status = $request->status;
        if ($status == 'index') {
            $results = Category::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Category::orderBy('id', 'desc')->get();
            }
        }
        if ($status == 'delete') {
            $results = Category::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Category::onlyTrashed()->orderBy('id', 'desc')->get();
            }
        }
        return view('admin.page.category.search', compact('results', 'status'));
    }
}
