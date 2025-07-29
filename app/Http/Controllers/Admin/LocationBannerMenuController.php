<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationbannermenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LocationBannerMenuController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index location banner')) {
            $locationbannermenus = Locationbannermenu::get();
            return view("admin.page.locationbannermenu.index", compact('locationbannermenus'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create location banner')) {
            return view('admin.page.locationbannermenu.create');
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('create location banner')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (Locationbannermenu::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $slug,
                    'status' => $request->has('status') ? true : false,
                ];
                Locationbannermenu::create($data);
                Alert::success('Thanh cong', 'Them moi vi tri banner menu thanh cong');
                return redirect()->route('admin.locationbannermenu.index')->with('success', 'Thêm mới vị trí banner menu thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationbannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function edit(string $id)
    {
        if (Auth::user()->can('edit location banner')) {
            try {
                $locationbannermenu = Locationbannermenu::where('id', $id)->first();
                if (!$locationbannermenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                    return redirect()->route('admin.locationbannermenu.index')->with('error', 'Khong tim thay danh muc!');
                }
                return view("admin.page.locationbannermenu.edit", compact('locationbannermenu'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationbannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function update(Request $request, string $id)
    {
        if (Auth::user()->can('edit location banner')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            try {
                $locationbannermenu = Locationbannermenu::where('id', $id)->first();
                if (!$locationbannermenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                    return redirect()->route('admin.locationbannermenu.index')->with('error', 'Khong tim thay danh muc!');
                }
                $originalSlug = Str::slug($request->name);
                $newSlug = $originalSlug;
                $count = 1;
                while (
                    Locationbannermenu::where('id', $newSlug)->where('slug', '!=', $locationbannermenu->slug)->exists()
                ) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $newSlug,
                    'status' => $request->has('status') ? true : false,
                ];
                $locationbannermenu->update($data);
                Alert::success('Thanh cong', 'Cap nhap vi tri banner menu thanh cong');
                return redirect()->route('admin.locationbannermenu.index')->with('success', 'Cập nhật thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationbannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function destroy(string $id)
    {
        if (Auth::user()->can('delete location banner')) {
            try {
                $locationbannermenu = Locationbannermenu::where('id', $id)->first();
                if (!$locationbannermenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                    return redirect()->route('admin.locationbannermenu.index')->with('error', 'Khong tim thay danh muc!');
                }
                $locationbannermenu->delete();
                Alert::success('Thanh cong', 'Xoa vi tri menu thanh cong');
                return redirect()->route('admin.locationbannermenu.index')->with('success', 'Xoa thanh cong thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationbannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
