<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bannermenu;
use App\Models\Bannermenuitem;
use App\Models\CategoryParent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerMenuItemController extends Controller
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
            $bannermenu = Bannermenu::where('id', $id)->first();
            if (!$bannermenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay banner menu');
                return redirect()->route('admin.bannermenu.index')->with('error', 'Khong tim thay menu!');
            }
            $request->validate([
                'group-a.*.image' => 'required',
                'group-a.*.link_banner_item' => 'required|url'
            ]);
            $bannermenu->name = $request->name;
            $bannermenu->save();
            $index = 1;
            if ($request['group-a']) {
                $menuitemlast = Bannermenuitem::where('bannermenu_id', $id)->orderBy('location', 'desc')->first();
                if ($menuitemlast) {
                    $index = ++$menuitemlast->location;
                }
                foreach ($request['group-a'] as $value) {
                    $datagroup[] = [
                        'image' => $value['image'],
                        'link' => $value['link_banner_item'],
                        'bannermenu_id' => $id,
                        'location' => $index++,
                    ];
                }
            }
            if (!empty($datagroup)) {
                foreach ($datagroup as $data) {
                    Bannermenuitem::create($data);
                }
            }
            Alert::success('Thanh cong', 'Cap nhap menu item thanh cong');
            return redirect()->route('admin.bannermenuitem.edit', ['id' => $id])->with('success', 'Cap nhap menu item thanh cong');
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
            $bannermenu = Bannermenu::where('id', $id)->first();
            if (!$bannermenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay product menu');
                return redirect()->route('admin.bannermenu.index')->with('error', 'Khong tim thay product menu!');
            }
            $bannermenuitems = Bannermenuitem::where('bannermenu_id', $id)->orderBy('location', 'asc')->get();
            if (!$bannermenuitems) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay product menu items');
                return redirect()->route('admin.bannermenu.index')->with('error', 'Khong tim thay product menu items!');
            }
            $categoryParents = CategoryParent::orderBy('id', 'desc')->get();
            if (!$categoryParents) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay category parents');
                return redirect()->route('admin.bannermenu.index')->with('error', 'Khong tim thay category parents!');
            }
            return view('admin.page.bannermenuitem.edit', compact('bannermenu', 'bannermenuitems', 'categoryParents'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', text: $th->getMessage());
            return redirect()->route('admin.bannermenumenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $index = 1;
            $image = $request['image'];
            $link_banner_stay = $request['link_banner_stay'];
            foreach ($request->location_stand as $key => $value) {
                $bannermenuitem = Bannermenuitem::where('id', $value)->first();
                $bannermenuitem->image = $image[$key];
                $bannermenuitem->link = $link_banner_stay[$key];
                $bannermenuitem->location = $index++;
                $bannermenuitem->save();
            }

            Alert::success('Thanh cong', 'Cap nhap menu thanh cong');
            return redirect()->back()->with('success', 'Cap nhap menu thanh cong');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', text: $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $bannermenuitem = Bannermenuitem::where("id", $id)->first();
            if (!$bannermenuitem) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay menu item');
                return redirect()->back()->with('error', 'Không tìm thấy item!');
            }
            $bannermenuitem->delete();
            Alert::success('Thanh cong', 'Xoa menu thanh cong');
            return redirect()->back()->with('success', 'Xóa menu item thanh cong');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
