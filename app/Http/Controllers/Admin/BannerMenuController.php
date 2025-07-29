<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bannermenu;
use App\Models\Locationbannermenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BannerMenuController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index location banner')) {
            $bannermenus = Bannermenu::all();
            return view("admin.page.bannermenu.index", compact("bannermenus"));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create location banner')) {
            $locationbannermenus = Locationbannermenu::where('status', true)->get();
            return view("admin.page.bannermenu.create", compact("locationbannermenus"));
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
                'locationbannermenu_id' => 'required|exists:locationbannermenus,id',
            ]);
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (Bannermenu::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $slug,
                    'locationbannermenu_id' => $request->locationbannermenu_id,
                ];
                Bannermenu::create($data);
                Alert::success('Thanh cong', 'Them moi banner menu thanh cong');
                return redirect()->route('admin.bannermenu.index')->with('success', 'Thêm mới banner menu thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.bannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $bannermenu = Bannermenu::where('id', $id)->first();
                if (!$bannermenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay banner menu');
                    return redirect()->route('admin.bannermenu.index')->with('error', 'Khong tim thay banner menu!');
                }
                $locationbannermenus = Locationbannermenu::where('status', true)->get();
                if (!$locationbannermenus) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay location banner menus');
                    return redirect()->route('admin.bannermenu.index')->with('error', 'Khong tim thay location banner menus!');
                }
                return view('admin.page.bannermenu.edit', compact('bannermenu', 'locationbannermenus'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.bannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $bannermenu = Bannermenu::where('id', $id)->first();
                if (!$bannermenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
                    return redirect()->route('admin.bannermenu.index')->with('error', 'Khong tim thay menu!');
                }
                $originalSlug = Str::slug($request->name);
                $newSlug = $originalSlug;
                $count = 1;
                while (
                    Bannermenu::where('id', $id)->where('slug', '!=', $bannermenu->slug)->exists()
                ) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $newSlug,
                    'locationbannermenu_id' => $request->locationbannermenu_id,
                ];
                $bannermenu->update($data);
                Alert::success('Thanh cong', 'Cap nhap banner menu thanh cong');
                return redirect()->route('admin.bannermenu.index')->with('success', 'Cập nhật thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.bannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $bannermenu = Bannermenu::where('id', $id)->first();
                if (!$bannermenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
                    return redirect()->route('admin.bannermenu.index')->with('error', 'Khong tim thay menu!');
                }
                $bannermenu->delete();
                Alert::success('Thanh cong', 'Xoa product menu thanh cong');
                return redirect()->route('admin.bannermenu.index')->with('success', 'Xoa thanh cong thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.bannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
