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
        if (Auth::user()->can('index category')) {
            $categories = Category::orderBy('id', 'desc')->get();
            return view('admin.page.category.index', compact('categories'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->can('create category')) {
            $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
            return view('admin.page.category.create', compact('categoryParents'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('index store')) {
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (Category::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $request->merge(['slug' => $slug]);
                $request->validate([
                    'name' => 'required|string|max:255',
                    'slug' => 'required|string|max:255',
                    'image' => 'nullable|url|max:255',
                    'is_hot' => 'nullable',
                    'category_parent_id' => 'required|exists:category_parents,id',
                ]);
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
                return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
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
    public function edit(string $slug)
    {
        if (Auth::user()->can('edit category')) {
            $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
            $category = Category::where('slug', $slug)->first();
            return view('admin.page.category.edit', compact('category', 'categoryParents'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        if (Auth::user()->can('update category')) {
            $category = Category::where('slug', $slug)->first();
            if (!$category) {
                return redirect()->route('admin.category.index')->with('error', 'Khong tim thay danh muc!');
            }
            try {
                $originalSlug = Str::slug($request->name);
                $newSlug = $originalSlug;
                $count = 1;
                while (
                    Category::where('slug', $newSlug)->where('slug', '!=', $category->slug)->exists()
                ) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
                $request->merge([
                    'slug' => $newSlug
                ]);
                $request->validate([
                    'name' => 'required|string|max:255',
                    'slug' => 'required|string|max:255' . $category->id,
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
                return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        if (Auth::user()->can('destroy category')) {
            $category = Category::onlyTrashed()->where('slug', $slug)->first();
            if (!$category) {
                return redirect()->route('admin.category.index')->with('error', 'Khong tim thay danh muc!');
            }
            try {
                $category->forceDelete();
                if (!empty($category->image)) {
                    $oldImagePath = public_path($category->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                return redirect()->route('admin.category.index')->with('success', 'Xoa danh muc thanh cong!');
            } catch (\Throwable $th) {
                return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function delete(string $slug)
    {
        if (Auth::user()->can('delete category')) {
            $category = Category::where('slug', $slug)->first();
            if (!$category) {
                return redirect()->route('admin.category.index')->with('error', 'Khong tim thay danh muc!');
            }
            try {
                $category->delete();
                return redirect()->route('admin.category.index')->with('success', 'Xoa danh muc thanh cong!');
            } catch (\Throwable $th) {
                return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function deleted()
    {
        if (Auth::user()->can('deleted category')){
            $categories = Category::onlyTrashed()->orderBy('id', 'desc')->get();
            return view('admin.page.category.restore', compact('categories'));
        }else{
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function restore(string $slug)
    {
        if (Auth::user()->can('restore category')){
            $category = Category::withTrashed()->where("slug", $slug)->first();
            if (!$category) {
                return redirect()->route('admin.category.index')->with('error', 'Khong tim thay danh muc!');
            }
            try {
                $category->restore();
                return redirect()->route('admin.category.index')->with('success', 'Khoi phuc danh muc thanh cong!');
            } catch (\Throwable $th) {
                return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        }else{
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
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
