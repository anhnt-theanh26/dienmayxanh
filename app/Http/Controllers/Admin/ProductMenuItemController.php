<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryParent;
use App\Models\Productmenu;
use App\Models\Productmenuitem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductMenuItemController extends Controller
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
            $productmenu = Productmenu::where('id', $id)->first();
            if (!$productmenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay product menu');
                return redirect()->route('admin.productmenu.index')->with('error', 'Khong tim thay menu!');
            }
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
            $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
            if (!$categoryParents) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay category parents');
                return redirect()->route('admin.productmenu.index')->with('error', 'Khong tim thay category parents!');
            }
            return view('admin.page.productmenuitem.edit', compact('productmenu', 'categoryParents', 'productmenuitems'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', text: $th->getMessage());
            return redirect()->route('admin.productmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
                $productmenuitem = Productmenuitem::where('id', $value)->first();
                $productmenuitem->location = $index++;
                $productmenuitem->save();
            }
            return redirect()->route('admin.productmenuitem.edit', ['id' => $id])->with('success', 'Cap nhap menu item thanh cong');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', text: $th->getMessage());
            return redirect()->route('admin.productmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productmenuitem = Productmenuitem::where("id", $id)->first();
        if (!$productmenuitem) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay menu item');
            return redirect()->back()->with('error', 'Không tìm thấy item!');
        }
        try {
            $productmenuitem->delete();
            Alert::success('Thanh cong', 'Xoa menu thanh cong');
            return redirect()->route('admin.productmenuitem.edit', ['id' => $id])->with('success', 'Xóa menu item thanh cong');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
