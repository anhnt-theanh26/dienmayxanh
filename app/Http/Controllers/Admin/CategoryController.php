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
            $categories = Category::orderBy('id', 'desc')->paginate(10);
            return view('admin.page.category.index', compact('categories'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


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


    public function store(Request $request)
    {
        if (Auth::user()->can('create category')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|max:255',
                'is_hot' => 'nullable',
                'category_parent_id' => 'required|exists:category_parents,id',
            ]);
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (Category::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $slug,
                    'is_hot' => $request->has('is_hot') ? true : false,
                    'category_parent_id' => $request->category_parent_id,
                    'image' => $request->image,
                ];

                Category::create($data);
                Alert::success('Thanh cong', 'Them moi danh muc thanh cong');
                return redirect()->route('admin.category.index')->with('success', 'Thêm mới danh mục thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function edit(string $id)
    {
        if (Auth::user()->can('edit category')) {
            try {
                $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
                $category = Category::where('id', $id)->first();
                return view('admin.page.category.edit', compact('category', 'categoryParents'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function update(Request $request, string $id)
    {
        if (Auth::user()->can('edit category')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|url|max:255',
                'is_hot' => 'nullable',
                'category_parent_id' => 'required|exists:category_parents,id',
            ]);
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
                $data = [
                    'name' => $request->name,
                    'slug' => $newSlug,
                    'is_hot' => $request->has('is_hot') ? true : false,
                    'category_parent_id' => $request->category_parent_id,
                    'image' => $request->image,
                ];
                $category->update($data);
                return redirect()->route('admin.category.index')->with('success', 'Cập nhật thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->route('admin.category.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function destroy(string $id)
    {
        if (Auth::user()->can('delete category')) {
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
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function delete(string $id)
    {
        if (Auth::user()->can('delete category')) {
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
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function deleted()
    {
        if (Auth::user()->can('index category')) {
            $categories = Category::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
            return view('admin.page.category.restore', compact('categories'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function restore(string $id)
    {
        if (Auth::user()->can('delete category')) {
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
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function search(Request $request, string $keyword)
    {
        if (Auth::user()->can('index category')) {
            $status = $request->status;
            if ($status == 'index') {
                $results = Category::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = Category::orderBy('id', 'desc')->paginate(10);
                }
            }
            if ($status == 'delete') {
                $results = Category::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = Category::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
                }
            }
            return view('admin.page.category.search', compact('results', 'status'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
