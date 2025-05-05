<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::orderBy('id', 'desc')->get();
        return view('admin.page.attribute.index', compact('attributes'));
        // if (Auth::user()->can('index attribute')){
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
        return view('admin.page.attribute.create');
        // if (Auth::user()->can('create attribute')){
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
        $originalSlug = Str::slug($request->name);
        $slug = $originalSlug;
        $count = 1;
        while (Attribute::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        $request->merge(['slug' => $slug]);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:attributes,slug',
        ]);
        $data = [
            'name' => $request->name,
            'slug' => $slug,
        ];
        try {
            Attribute::create($data);
            Alert::success('Thanh cong', 'Them moi thuoc tinh thanh cong');
            return redirect()->route('admin.attribute.index')->with('success', 'Thêm mới thuộc tính thành công');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.attribute.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('store attribute')){
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
        if (Auth::user()->can('show attribute')) {
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
        $attribute = Attribute::where('slug', $slug)->first();
        if (!$attribute) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay thuoc tinh:');
            return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay thuoc tinh');
        }
        return view('admin.page.attribute.edit', compact('attribute'));
        // if (Auth::user()->can('edit attribute')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $attribute = Attribute::where('slug', $slug)->first();
        if (!$attribute) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay thuoc tinh');
            
            return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay bai viet!');
        }
        $originalSlug = Str::slug($request->name);
        $newSlug = $originalSlug;
        $count = 1;
        while (Attribute::where('slug', $newSlug)->where('slug', '!=', $attribute->newSlug)->exists()) {
            $newSlug = $originalSlug . '-' . $count++;
        }
        $request->merge([
            'slug' => $newSlug
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:attributes,slug,' . $attribute->id,
        ]);
        $data = [
            'name' => $request->name,
            'slug' => $newSlug,
        ];
        try {
            $attribute->update($data);
            Alert::success('Thanh cong', 'Cap nhap thuoc tinh thanh cong');
            return redirect()->route('admin.attribute.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.attribute.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('update attribute')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $attribute = Attribute::onlyTrashed()->where('slug', $slug)->first();
        if (!$attribute) {
            Alert::error('Khong thay thuoc tinh', 'thuoc tinh khong ton tai');
            return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay thuoc tinh!');
        }
        try {
            $attribute->forceDelete();
            Alert::success('Thanh cong', 'Xoa vinh vien thuoc tinh thanh cong');
            return redirect()->route('admin.attribute.index')->with('success', 'Xoa thuoc tinh thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.attribute.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('destroy attribute')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function delete(string $slug)
    {
        $attribute = Attribute::where('slug', $slug)->first();
        if (!$attribute) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay thuoc tinh');
            return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay thuoc tinh!');
        }
        try {
            $attribute->delete();
            Alert::success('Thanh cong', 'Xoa thuoc tinh thanh cong');
            return redirect()->route('admin.attribute.index')->with('success', 'Xoa thuoc tinh thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.attribute.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('deleted attribute')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function deleted()
    {
        $attributes = Attribute::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('admin.page.attribute.restore', compact('attributes'));
        // if (Auth::user()->can('deleted attribute')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function restore(string $slug)
    {
        $attribute = Attribute::withTrashed()->where("slug", $slug)->first();
        if (!$attribute) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay thuoc tinh');
            return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay thuoc tinh!');
        }
        try {
            $attribute->restore();
            Alert::success('Thanh cong', 'Khoi phuc thuoc tinh thanh cong');
            return redirect()->route('admin.attribute.index')->with('success', 'Khoi phuc thuoc tinh thanh cong!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.attribute.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
        // if (Auth::user()->can('restore attribute')){
        // }else{
        //     Alert::error('Không có quyền truy cập');
        //     return redirect()->route('admin.dashboard');
        // }
    }

    public function search(Request $request, string $keyword)
    {
        $status = $request->status;
        if ($status == 'index') {
            $results = Attribute::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Attribute::orderBy('id', 'desc')->get();
            }
        }
        if ($status == 'delete') {
            $results = Attribute::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
            if ($keyword == ' ') {
                $results = Attribute::onlyTrashed()->orderBy('id', 'desc')->get();
            }
        }
        return view('admin.page.attribute.search', compact('results', 'status'));
    }
}
