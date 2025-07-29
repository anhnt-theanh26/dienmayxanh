<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationmenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index location menu')) {
            $menus = Menu::all();
            return view("admin.page.menu.index", compact("menus"));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create location menu')) {
            $locationmenus = Locationmenu::where('status', true)->get();
            return view("admin.page.menu.create", compact("locationmenus"));
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
                'locationmenu_id' => 'required|exists:locationmenus,id',
            ]);
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (Menu::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $slug,
                    'locationmenu_id' => $request->locationmenu_id,
                ];
                Menu::create($data);
                Alert::success('Thanh cong', 'Them moi menu thanh cong');
                return redirect()->route('admin.menu.index')->with('success', 'Thêm mới menu thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.menu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $menu = Menu::where('id', $id)->first();
                if (!$menu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
                    return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay menu!');
                }
                $locationmenus = Locationmenu::where('status', true)->get();
                if (!$locationmenus) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay location menus');
                    return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay location menus!');
                }
                return view('admin.page.menu.edit', compact('menu', 'locationmenus'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.menu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                'locationmenu_id' => 'required|exists:locationmenus,id',
            ]);
            try {
                $menu = Menu::where('id', $id)->first();
                if (!$menu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
                    return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay menu!');
                }
                $originalSlug = Str::slug($request->name);
                $newSlug = $originalSlug;
                $count = 1;
                while (
                    Menu::where('id', $id)->where('slug', '!=', $menu->slug)->exists()
                ) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $newSlug,
                    'locationmenu_id' => $request->locationmenu_id,
                ];
                $menu->update($data);
                Alert::success('Thanh cong', 'Cap nhap menu thanh cong');
                return redirect()->route('admin.menu.index')->with('success', 'Cập nhật thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.menu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $menu = Menu::where('id', $id)->first();
                if (!$menu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
                    return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay menu!');
                }
                $menu->delete();
                Alert::success('Thanh cong', 'Xoa menu thanh cong');
                return redirect()->route('admin.menu.index')->with('success', 'Xoa thanh cong thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.menu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
