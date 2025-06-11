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
        if (Auth::user()->can('index attribute')) {
            $attributes = Attribute::orderBy('id', 'desc')->paginate(10);
            return view('admin.page.attribute.index', compact('attributes'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create attribute')) {
            return view('admin.page.attribute.create');
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('create attribute')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (Attribute::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $slug,
                ];
                Attribute::create($data);
                Alert::success('Thanh cong', 'Them moi thuoc tinh thanh cong');
                return redirect()->route('admin.attribute.index')->with('success', 'Thêm mới thuộc tính thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra:', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function edit(string $id)
    {
        if (Auth::user()->can('edit attribute')) {
            try {
                $attribute = Attribute::where('id', $id)->first();
                if (!$attribute) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay thuoc tinh:');
                    return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay thuoc tinh');
                }
                return view('admin.page.attribute.edit', compact('attribute'));
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
        if (Auth::user()->can('edit attribute')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            try {
                $attribute = Attribute::where('id', $id)->first();
                if (!$attribute) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay thuoc tinh');
                    return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay bai viet!');
                }
                $originalSlug = Str::slug($request->name);
                $newSlug = $originalSlug;
                $count = 1;
                while (Attribute::where('slug', $newSlug)->where('id', '!=', $attribute->id)->exists()) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $newSlug,
                ];
                $attribute->update($data);
                Alert::success('Thanh cong', 'Cap nhap thuoc tinh thanh cong');
                return redirect()->route('admin.attribute.index')->with('success', 'Cập nhật thành công!');
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
        if (Auth::user()->can('delete attribute')) {
            try {
                $attribute = Attribute::onlyTrashed()->where('id', $id)->first();
                if (!$attribute) {
                    Alert::error('Khong thay thuoc tinh', 'thuoc tinh khong ton tai');
                    return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay thuoc tinh!');
                }
                $attribute->forceDelete();
                Alert::success('Thanh cong', 'Xoa vinh vien thuoc tinh thanh cong');
                return redirect()->route('admin.attribute.index')->with('success', 'Xoa thuoc tinh thanh cong!');
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
        if (Auth::user()->can('delete attribute')) {
            try {
                $attribute = Attribute::where('id', $id)->first();
                if (!$attribute) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay thuoc tinh');
                    return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay thuoc tinh!');
                }
                $attribute->delete();
                Alert::success('Thanh cong', 'Xoa thuoc tinh thanh cong');
                return redirect()->route('admin.attribute.index')->with('success', 'Xoa thuoc tinh thanh cong!');
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
        if (Auth::user()->can('index attribute')) {
            $attributes = Attribute::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
            return view('admin.page.attribute.restore', compact('attributes'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function restore(string $id)
    {
        if (Auth::user()->can('delete attribute')) {
            try {
                $attribute = Attribute::withTrashed()->where("id", $id)->first();
                if (!$attribute) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay thuoc tinh');
                    return redirect()->route('admin.attribute.index')->with('error', 'Khong tim thay thuoc tinh!');
                }
                $attribute->restore();
                Alert::success('Thanh cong', 'Khoi phuc thuoc tinh thanh cong');
                return redirect()->route('admin.attribute.index')->with('success', 'Khoi phuc thuoc tinh thanh cong!');
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
        if (Auth::user()->can('index attribute')) {
            $status = $request->status;
            if ($status == 'index') {
                $results = Attribute::where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = Attribute::orderBy('id', 'desc')->paginate(10);
                }
            }
            if ($status == 'delete') {
                $results = Attribute::onlyTrashed()->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->paginate(10);
                if ($keyword == ' ') {
                    $results = Attribute::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
                }
            }
            return view('admin.page.attribute.search', compact('results', 'status'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
