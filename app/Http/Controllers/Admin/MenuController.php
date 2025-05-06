<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationmenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view("admin.page.menu.index", compact("menus"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locationmenus = Locationmenu::where('status', true)->get();
        return view("admin.page.menu.create", compact("locationmenus"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $originalSlug = Str::slug($request->name);
            $slug = $originalSlug;
            $count = 1;
            while (Menu::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $request->merge(['slug' => $slug]);
            $request->validate([
                'name' => 'required|string|max:255',
                'locationmenu_id' => 'required|exists:locationmenus,id',
            ]);
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::where('id', $id)->first();
        if (!$menu) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
            return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay menu!');
        }
        try {
            $originalSlug = Str::slug($request->name);
            $newSlug = $originalSlug;
            $count = 1;
            while (
                Menu::where('id', $id)->where('slug', '!=', $menu->slug)->exists()
            ) {
                $newSlug = $originalSlug . '-' . $count++;
            }
            $request->merge([
                'slug' => $newSlug
            ]);
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:locationmenus,slug,' . $menu->id,
                'locationmenu_id' => 'required|exists:locationmenus,id',
            ]);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::where('id', $id)->first();
        if (!$menu) {
            Alert::error('Có lỗi xảy ra', 'Khong tim thay menu');
            return redirect()->route('admin.menu.index')->with('error', 'Khong tim thay menu!');
        }
        try {
            $menu->delete();
            Alert::success('Thanh cong', 'Xoa menu thanh cong');
            return redirect()->route('admin.menu.index')->with('success', 'Xoa thanh cong thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.menu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
