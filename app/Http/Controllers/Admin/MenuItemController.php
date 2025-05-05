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
        $menu = Menu::where('id', $id)->first();
        if (!$menu) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
            return redirect()->route('admin.locationmenu.index')->with('error', 'Khong tim thay menu!');
        }
        $menu->name = $request->name;
        $menu->save();
        $index = 1;
        if ($request->category) {
            foreach ($request->category as $value) {
                $cate = Category::where('id', $value)->first();
                $data[] = [
                    'name' => $cate->name,
                    'link' => '/category' . $cate->slug,
                    'location' => $index++,
                    'menu_id' => $id,
                ];
            }
        }
        if ($request->name_menu_item) {
            $data[] = [
                'name' => $request->name_menu_item,
                'link' => $request->link_menu_item,
                'location' => $index++,
                'menu_id' => $id,
            ];
        }
        if (!empty($data)) {
            foreach ($data as $value) {
                Menuitem::create($value);
            }
        }
        Alert::success('Thanh cong', 'Cap nhap menu item thanh cong');
        return redirect()->route('admin.menuitem.edit', ['id' => $id])->with('success', 'Cap nhap menu item thanh cong');
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
        $menu = Menu::where('id', $id)->first();
        $menuitems = Menuitem::where('menu_id', $id)->orderBy('location', 'asc')->get();
        $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
        return view('admin.page.menuitem.edit', compact('menu', 'categoryParents', 'menuitems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menuitems = Menuitem::where('menu_id', $id)->get();
        foreach ($menuitems as $key => $menuitem) {
            $menuitem['location'] = $request->location_stand[$key];
            $menuitem->save();
        }
        return redirect()->route('admin.menuitem.edit', ['id' => $id])->with('success', 'Cap nhap menu item thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menuitem = Menuitem::where("id", $id)->first();
        if (!$menuitem) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay menu item');
            return redirect()->route('admin.category-parent.index')->with('error', 'Không tìm thấy item!');
        }
        try {
            $menuitem->delete();
            Alert::success('Thanh cong', 'Xoa menu thanh cong');
            return redirect()->route('admin.menuitem.edit', ['id' => $id])->with('success', 'Xóa menu item thanh cong');

        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.category-parent.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
