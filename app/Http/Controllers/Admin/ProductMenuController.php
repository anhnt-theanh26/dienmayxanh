<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationproductmenu;
use App\Models\Menuitem;
use App\Models\Productmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductMenuController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index location product')) {
            $productmenus = Productmenu::all();
            return view("admin.page.productmenu.index", compact("productmenus"));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }


    public function create()
    {
        if (Auth::user()->can('create location product')) {
            $locationproductmenus = Locationproductmenu::where('status', true)->get();
            return view("admin.page.productmenu.create", compact("locationproductmenus"));
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
                'locationproductmenu_id' => 'required|exists:locationproductmenus,id',
            ]);
            try {
                $originalSlug = Str::slug($request->name);
                $slug = $originalSlug;
                $count = 1;
                while (Productmenu::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $slug,
                    'locationproductmenu_id' => $request->locationproductmenu_id,
                ];
                Productmenu::create($data);
                Alert::success('Thanh cong', 'Them moi prodcut menu thanh cong');
                return redirect()->route('admin.productmenu.index')->with('success', 'Thêm mới prodcut menu thành công');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.productmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $productmenu = Productmenu::where('id', $id)->first();
                if (!$productmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay product menu');
                    return redirect()->route('admin.productmenu.index')->with('error', 'Khong tim thay product menu!');
                }
                $locationproductmenus = Locationproductmenu::where('status', true)->get();
                if (!$locationproductmenus) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay location product menus');
                    return redirect()->route('admin.productmenu.index')->with('error', 'Khong tim thay location product menus!');
                }
                return view('admin.page.productmenu.edit', compact('productmenu', 'locationproductmenus'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.productmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $productmenu = Productmenu::where('id', $id)->first();
                if (!$productmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
                    return redirect()->route('admin.productmenu.index')->with('error', 'Khong tim thay menu!');
                }
                $originalSlug = Str::slug($request->name);
                $newSlug = $originalSlug;
                $count = 1;
                while (
                    Productmenu::where('id', $id)->where('slug', '!=', $productmenu->slug)->exists()
                ) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
                $data = [
                    'name' => $request->name,
                    'slug' => $newSlug,
                    'locationproductmenu_id' => $request->locationproductmenu_id,
                ];
                $productmenu->update($data);
                Alert::success('Thanh cong', 'Cap nhap product menu thanh cong');
                return redirect()->route('admin.productmenu.index')->with('success', 'Cập nhật thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.productmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $productmenu = Productmenu::where('id', $id)->first();
                if (!$productmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
                    return redirect()->route('admin.productmenu.index')->with('error', 'Khong tim thay menu!');
                }
                $productmenu->delete();
                Alert::success('Thanh cong', 'Xoa product menu thanh cong');
                return redirect()->route('admin.productmenu.index')->with('success', 'Xoa thanh cong thành công!');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->route('admin.productmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
