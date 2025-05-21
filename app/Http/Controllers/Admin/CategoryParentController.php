<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryParentController extends Controller
{
    public function index()
    {
        $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
        return view("admin/page/category-parent/index", compact("categoryParents"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin/page/category-parent/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
        ]);
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
            return redirect()->route('admin.category-parent.index')->with('error', 'Co loi xay ra:' . $th->getMessage());
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
            $categoryParent = CategoryParent::where('id', $id)->first();
            return view('admin.page.category-parent.edit', compact('categoryParent'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category-parent.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|string|max:255",
        ]);
        try {
            $categoryParent = CategoryParent::where('id', $id)->first();
            if (!$categoryParent) {
                return redirect()->route('admin.category-parent.index')->with('error', 'Khong tim thay danh muc!');
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
            return redirect()->route('admin.category-parent.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category-parent.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
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
            return redirect()->route('admin.category-parent.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function deleted()
    {
        $categoryParents = CategoryParent::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view("admin/page/category-parent/restore", compact("categoryParents"));
    }

    public function restore(string $id)
    {
        try {
            $categoryParent = CategoryParent::withTrashed()->where("id", $id)->first();
            if (!$categoryParent) {
                return redirect()->route('admin.category-parent.index')->with('error', 'Khong tim thay danh muc!');
            }
            $categoryParent->restore();
            return redirect()->route('admin.category-parent.index')->with('success', 'Khoi phuc danh muc thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category-parent.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function destroy(string $id)
    {
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
            return redirect()->route('admin.category-parent.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    public function search(Request $request, string $keyword)
    {
        $status = $request->status;
        if ($status == 'index') {
            $results = CategoryParent::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = CategoryParent::orderBy('id', 'desc')->get();
            }
        }
        if ($status == 'delete') {
            $results = CategoryParent::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = CategoryParent::onlyTrashed()->orderBy('id', 'desc')->get();
            }
        }
        return view('admin.page.category-parent.search', compact('results', 'status'));
    }
}
