<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LocationMenuController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index location menu')) {
            $locationmenus = Locationmenu::all();
            return view("admin.page.locationmenu.index", compact('locationmenus'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create location menu')) {
            return view('admin.page.locationmenu.create');
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->can('create location menu')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (Locationmenu::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $slug,
                    'status' => $request->has('status') ? true : false,
                ];

                Locationmenu::create($data);
                Alert::success('Thanh cong', 'Them moi vi tri menu thanh cong');
                return redirect()->route('admin.locationmenu.index')->with('success', 'Thêm mới vị trí menu thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function edit(string $id)
    {
        if (Auth::user()->can('edit location menu')) {
            try {
                $locationmenu = Locationmenu::where('id', $id)->first();
                if (!$locationmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                    return redirect()->route('admin.locationmenu.index')->with('error', 'Khong tim thay danh muc!');
                }
                return view('admin.page.locationmenu.edit', compact('locationmenu'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function update(Request $request, string $id)
    {
        if (Auth::user()->can('edit location menu')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            try {
                $locationmenu = Locationmenu::where('id', $id)->first();
                if (!$locationmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                    return redirect()->route('admin.locationmenu.index')->with('error', 'Khong tim thay danh muc!');
                }
                $originalSlug = Str::slug($request->name);
                $newSlug = $originalSlug;
                $count = 1;
                while (
                    Locationmenu::where('slug', $newSlug)->where('id', '!=', $locationmenu->id)->exists()
                ) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $newSlug,
                    'status' => $request->has('status') ? true : false,
                ];
                $locationmenu->update($data);
                Alert::success('Thanh cong', 'Cap nhap vi tri menu thanh cong');
                return redirect()->route('admin.locationmenu.index')->with('success', 'Cập nhật thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function destroy(string $id)
    {
        if (Auth::user()->can('delete location menu')) {
            try {
                $locationmenu = Locationmenu::where('id', $id)->first();
                if (!$locationmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                    return redirect()->route('admin.locationmenu.index')->with('error', 'Khong tim thay danh muc!');
                }
                $locationmenu->delete();
                Alert::success('Thanh cong', 'Xoa vi tri menu thanh cong');
                return redirect()->route('admin.locationmenu.index')->with('success', 'Xoa thanh cong thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.locationmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
