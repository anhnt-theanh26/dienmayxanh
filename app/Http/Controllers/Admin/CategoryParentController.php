<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryParentController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index category parent')) {
            $categoryParents = CategoryParent::orderBy('id', 'desc')->paginate(10);
            return view("admin/page/category-parent/index", compact("categoryParents"));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create category parent')) {
            return view("admin/page/category-parent/create");
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('create category parent')) {
            Log::info('create category parent start');
            $request->validate([
                "name" => "required|string|max:255",
            ]);
            Log::info('create category parent end');
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (CategoryParent::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $slug,
                ];
                CategoryParent::create($data);
                return redirect()->route('admin.category-parent.index')->with('success', 'Them moi thanh cong!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Co loi xay ra:' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function show(string $id)
    {
    }


    public function edit(string $id)
    {
        if (Auth::user()->can('edit category parent')) {
            try {
                $categoryParent = CategoryParent::where('id', $id)->first();
                return view('admin.page.category-parent.edit', compact('categoryParent'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function update(Request $request, string $id)
    {
        if (Auth::user()->can('edit category parent')) {
            $request->validate([
                "name" => "required|string|max:255",
            ]);
            try {
                $categoryParent = CategoryParent::where('id', $id)->first();
                if (!$categoryParent) {
                    return redirect()->back()->with('error', 'Khong tim thay danh muc!');
                }
                $originalSlug = Str::slug($request->name);
                $newSlug = $originalSlug;
                $count = 1;
                while (
                    CategoryParent::where('slug', $newSlug)->where('id', '!=', $categoryParent->id)->exists()
                ) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $newSlug,
                ];
                $categoryParent->update($data);
                return redirect()->back()->with('success', 'Cập nhật thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function delete(string $id)
    {
        if (Auth::user()->can('delete category parent')) {
            try {
                $categoryParent = CategoryParent::where('id', $id)->first();
                if (!$categoryParent) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay danh muc cha');
                    return redirect()->route('admin.category-parent.index')->with('error', 'Khong tim thay danh muc!');
                }
                $categoryParent->delete();
                return redirect()->route('admin.category-parent.index')->with('success', 'Xoa danh muc thanh cong!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function deleted()
    {
        if (Auth::user()->can('index category parent')) {
            $categoryParents = CategoryParent::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
            return view("admin/page/category-parent/restore", compact("categoryParents"));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function restore(string $id)
    {
        if (Auth::user()->can('delete category parent')) {
            try {
                $categoryParent = CategoryParent::withTrashed()->where("id", $id)->first();
                if (!$categoryParent) {
                    return redirect()->route('admin.category-parent.index')->with('error', 'Khong tim thay danh muc!');
                }
                $categoryParent->restore();
                return redirect()->route('admin.category-parent.index')->with('success', 'Khoi phuc danh muc thanh cong!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function destroy(string $id)
    {
        if (Auth::user()->can('delete category parent')) {
            try {
                $categoryParent = CategoryParent::withTrashed()->where("id", $id)->first();
                if (!$categoryParent) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay danh muc cha');
                    return redirect()->route('admin.category-parent.index')->with('error', 'Không tìm thấy danh mục!');
                }
                $categoryParent->forceDelete();
                return redirect()->route('admin.category-parent.index')->with('success', 'Xóa danh mục thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function search(Request $request, string $keyword)
    {
        if (Auth::user()->can('index category parent')) {
            $status = $request->status;
            if ($status == 'index') {
                $results = CategoryParent::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = CategoryParent::orderBy('id', 'desc')->paginate(10);
                }
            }
            if ($status == 'delete') {
                $results = CategoryParent::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = CategoryParent::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
                }
            }
            return view('admin.page.category-parent.search', compact('results', 'status'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
