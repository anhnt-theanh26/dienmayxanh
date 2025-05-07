<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryParent;
use App\Models\Menu;
use App\Models\Menuitem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        try {
            //code...
            $menu = Menu::where('id', $id)->first();
            if (!$menu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
                return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay menu!');
            }
            $menu->name = $request->name;
            $menu->save();
            $index = 1;
            if ($request->category) {
                $menuitemlast = Menuitem::where('menu_id', $id)->orderBy('location', 'desc')->first();
                if ($menuitemlast) {
                    $index = ++$menuitemlast->location;
                }
                foreach ($request->category as $value) {
                    $cate = Category::where('id', $value)->first();
                    $data[] = [
                        'name' => strtolower($cate->name),
                        'link' => '/category/' . $cate->slug,
                        'location' => $index++,
                        'menu_id' => $id,
                    ];
                }
            }
            if ($request->name_menu_item) {
                $menuitemlast = Menuitem::where('menu_id', $id)->orderBy('location', 'desc')->first();
                if ($menuitemlast) {
                    $index = ++$menuitemlast->location;
                }
                $data[] = [
                    'name' => strtolower($request->name_menu_item),
                    'link' => $request->link_menu_item,
                    'location' => $index++,
                    'menu_id' => $id,
                ];
            }
            if (!empty($data)) {
                foreach ($data as $value) {
                    $menuitem = Menuitem::where('name', $value['name'])->where('link', $value['link'])->where('menu_id', $value['menu_id'])->first();
                    if (empty($menuitem)) {
                        Menuitem::create($value);
                    }
                }
            }
            Alert::success('Thanh cong', 'Cap nhap menu item thanh cong');
            return redirect()->route('admin.menuitem.edit', ['id' => $id])->with('success', 'Cap nhap menu item thanh cong');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra:', $th->getMessage());
            return redirect()->route('admin.menu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $menu = Menu::where('id', $id)->first();
            if (!$menu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
                return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay menu!');
            }
            $menuitems = Menuitem::where('menu_id', $id)->orderBy('location', 'asc')->get();
            if (!$menuitems) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay menu items');
                return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay menu items!');
            }
            $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
            if (!$categoryParents) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay category parents');
                return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay category parents!');
            }
            return view('admin.page.menuitem.edit', compact('menu', 'categoryParents', 'menuitems'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', text: $th->getMessage());
            return redirect()->route('admin.menu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $index = 1;
            foreach ($request->location_stand as $value) {
                $menuitem = Menuitem::where('id', $value)->first();
                $menuitem->location = $index++;
                $menuitem->save();
            }
            return redirect()->route('admin.menuitem.edit', ['id' => $id])->with('success', 'Cap nhap menu item thanh cong');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', text: $th->getMessage());
            return redirect()->route('admin.menuitem.edit', ['id' => $id])->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $menuitem = Menuitem::where("id", $id)->first();
            if (!$menuitem) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay menu item');
                return redirect()->route('admin.menuitem.edit', ['id' => $id])->with('error', 'Không tìm thấy item!');
            }
            $menuitem->delete();
            Alert::success('Thanh cong', 'Xoa menu thanh cong');
            return redirect()->back()->with('success', 'Xóa menu item thanh cong');

        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
