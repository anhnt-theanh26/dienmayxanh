<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationproductmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class LocationProductMenuController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index location product')) {
            $locationproductmenus = Locationproductmenu::get();
            return view("admin.page.locationproductmenu.index", compact('locationproductmenus'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create location product')) {
            return view('admin.page.locationproductmenu.create');
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('create location product')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (Locationproductmenu::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $slug,
                    'status' => $request->has('status') ? true : false,
                ];
                Locationproductmenu::create($data);
                Alert::success('Thanh cong', 'Them moi vi tri product menu thanh cong');
                return redirect()->route('admin.locationproductmenu.index')->with('success', 'Thêm mới vị trí product menu thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationproductmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }

    public function edit(string $id)
    {
        if (Auth::user()->can('edit location product')) {
            try {
                $locationproductmenu = Locationproductmenu::where('id', $id)->first();
                if (!$locationproductmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                    return redirect()->route('admin.locationproductmenu.index')->with('error', 'Khong tim thay danh muc!');
                }
                return view("admin.page.locationproductmenu.edit", compact('locationproductmenu'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationproductmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function update(Request $request, string $id)
    {
        if (Auth::user()->can('edit location product')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            try {
                $locationproductmenu = Locationproductmenu::where('id', $id)->first();
                if (!$locationproductmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                    return redirect()->route('admin.locationproductmenu.index')->with('error', 'Khong tim thay danh muc!');
                }
                $originalSlug = Str::slug($request->name);
                $newSlug = $originalSlug;
                $count = 1;
                while (
                    Locationproductmenu::where('id', $newSlug)->where('slug', '!=', $locationproductmenu->slug)->exists()
                ) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $newSlug,
                    'status' => $request->has('status') ? true : false,
                ];
                $locationproductmenu->update($data);
                Alert::success('Thanh cong', 'Cap nhap vi tri product menu thanh cong');
                return redirect()->route('admin.locationproductmenu.index')->with('success', 'Cập nhật thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationproductmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function destroy(string $id)
    {
        if (Auth::user()->can('delete location product')) {
            try {
                $locationproductmenu = Locationproductmenu::where('id', $id)->first();
                if (!$locationproductmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                    return redirect()->route('admin.locationproductmenu.index')->with('error', 'Khong tim thay danh muc!');
                }
                $locationproductmenu->delete();
                Alert::success('Thanh cong', 'Xoa vi tri menu thanh cong');
                return redirect()->route('admin.locationproductmenu.index')->with('success', 'Xoa thanh cong thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationproductmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
