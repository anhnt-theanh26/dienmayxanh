<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryParent;
use App\Models\Productmenu;
use App\Models\Productmenuitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductMenuItemController extends Controller
{
    public function store(Request $request, string $id)
    {
        if (Auth::user()->can('create location product')) {
            try {
                $productmenu = Productmenu::where('id', $id)->first();
                if (!$productmenu) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay product menu');
                    return redirect()->route('admin.productmenu.index')->with('error', 'Khong tim thay menu!');
                }
                $request->validate([
                    'name' => 'required|string|max:255',
                ]);
                $productmenu->name = $request->name;
                $productmenu->save();
                $index = 1;
                if ($request->category) {
                    $menuitemlast = Productmenuitem::where('productmenu_id', $id)->orderBy('location', 'desc')->first();
                    if ($menuitemlast) {
                        $index = ++$menuitemlast->location;
                    }
                    foreach ($request->category as $value) {
                        $cate = Category::where('id', $value)->first();
                        $data[] = [
                            'name' => $cate->name,
                            'link' => '/category/' . $cate->slug,
                            'location' => $index++,
                            'productmenu_id' => $id,
                            'category_id' => $cate->id,
                        ];
                    }
                }
                if (!empty($data)) {
                    foreach ($data as $value) {
                        $menuitem = Productmenuitem::where('name', $value['name'])->where('link', $value['link'])->where('productmenu_id', $value['productmenu_id'])->first();
                        if (empty($menuitem)) {
                            Productmenuitem::create($value);
                        }
                    }
                }
                Alert::success('Thanh cong', 'Cap nhap menu item thanh cong');
                return redirect()->route('admin.productmenuitem.edit', ['id' => $id])->with('success', 'Cap nhap menu item thanh cong');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', text: $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $productmenuitems = Productmenuitem::where('productmenu_id', $id)->orderBy('location', 'asc')->get();
                if (!$productmenuitems) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay product menu items');
                    return redirect()->route('admin.productmenu.index')->with('error', 'Khong tim thay product menu items!');
                }
                $categoryParents = CategoryParent::get();
                if (!$categoryParents) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay category parents');
                    return redirect()->route('admin.productmenu.index')->with('error', 'Khong tim thay category parents!');
                }
                return view('admin.page.productmenuitem.edit', compact('productmenu', 'categoryParents', 'productmenuitems'));
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', text: $th->getMessage());
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
            try {
                $index = 1;
                foreach ($request->location_stand as $value) {
                    $productmenuitem = Productmenuitem::where('id', $value)->first();
                    $productmenuitem->location = $index++;
                    $productmenuitem->save();
                }
                Alert::success('Thanh cong', 'Cap nhap menu thanh cong');
                return redirect()->route('admin.productmenuitem.edit', ['id' => $id])->with('success', 'Cap nhap menu item thanh cong');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', text: $th->getMessage());
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
                $productmenuitem = Productmenuitem::where("id", $id)->first();
                if (!$productmenuitem) {
                    Alert::error('Có lỗi xảy ra', 'Khong tim thay menu item');
                    return redirect()->back()->with('error', 'Không tìm thấy item!');
                }
                $productmenuitem->delete();
                Alert::success('Thanh cong', 'Xoa menu thanh cong');
                return redirect()->back()->with('success', 'Xóa menu item thanh cong');
            } catch (\Throwable $th) {
                Alert::error('Có lỗi xảy ra', $th->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
            }
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
