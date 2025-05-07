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
        // if (Auth::user()->can('index category parent')) {
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
        if (Auth::user()->can('create category parent')) {
            return view("admin/page/category-parent/create");
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
        try {
            $originalSlug = Str::slug($request->name);
            $slug = $originalSlug;
            $count = 1;
            while (CategoryParent::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $request->merge(['slug' => $slug]);
            $validated = $request->validate([
                "name" => "required|string|max:255",
                "slug" => "required|string|max:255",
            ]);
            $data = [
                'name' => $validated['name'],
                'slug' => $validated['slug'],
            ];
            CategoryParent::create($data);
            return redirect()->route('admin.category-parent.index')->with('success', 'Them moi thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category-parent.index')->with('error', 'Co loi xay ra:' . $th->getMessage());
        }
        // if (Auth::user()->can('store category parent')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->can('show category parent')) {
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
            $categoryParent = CategoryParent::where('id', $id)->first();
            return view('admin.page.category-parent.edit', compact('categoryParent'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category-parent.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('edit category parent')){
        // }else{
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
            $request->merge([
                'slug' => $newSlug
            ]);
            $request->validate([
                "name" => "required|string|max:255",
                "slug" => "required|string|max:255|unique:category_parents,slug," . $categoryParent->id,
            ]);
            $data = [
                'name' => $request['name'],
                'slug' => $newSlug,
            ];
            $categoryParent->update($data);
            return redirect()->route('admin.category-parent.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.category-parent.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('update category parent')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
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
        // if (Auth::user()->can('delete category parent')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function deleted()
    {
        $categoryParents = CategoryParent::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view("admin/page/category-parent/restore", compact("categoryParents"));
        // if (Auth::user()->can('deleted category parent')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
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
        // if (Auth::user()->can('restore category parent')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
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
        // if (Auth::user()->can('destroy category parent')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
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
