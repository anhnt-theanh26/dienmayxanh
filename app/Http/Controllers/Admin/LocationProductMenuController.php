<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationproductmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class LocationProductMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locationproductmenus = Locationproductmenu::get();
        return view("admin.page.locationproductmenu.index", compact('locationproductmenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.locationproductmenu.create');
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
            while (Locationproductmenu::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $request->merge(['slug' => $slug]);
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
            ]);
            $data = [
                'name' => $request->name,
                'slug' => $slug,
                'status' => $request->has('status') ? true : false,
            ];
            Locationproductmenu::create($data);
            Alert::success('Thanh cong', 'Them moi vi tri product menu thanh cong');
            return redirect()->route('admin.locationproductmenu.index')->with('success', 'Thêm mới vị trí product menu thành công');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationproductmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
            $locationproductmenu = Locationproductmenu::where('id', $id)->first();
            if (!$locationproductmenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                return redirect()->route('admin.locationproductmenu.index')->with('error', 'Khong tim thay danh muc!');
            }
            return view("admin.page.locationproductmenu.edit", compact('locationproductmenu'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationproductmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $locationproductmenu = Locationproductmenu::where('id', $id)->first();
            if (!$locationproductmenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                return redirect()->route('admin.locationproductmenu.index')->with('error', 'Khong tim thay danh muc!');
            }
            $originalSlug = Str::slug($request->name);
            $newSlug = $originalSlug;
            $count = 1;
            while (
                Locationproductmenu::where('id', $newSlug)->where('slug', '!=', $locationproductmenu->slug)->exists()
            ) {
                $newSlug = $originalSlug . '-' . $count++;
            }
            $request->merge([
                'slug' => $newSlug
            ]);
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:locationproductmenus,slug,' . $locationproductmenu->id,
            ]);
            $data = [
                'name' => $request->name,
                'slug' => $newSlug,
                'status' => $request->has('status') ? true : false,
            ];
            $locationproductmenu->update($data);
            Alert::success('Thanh cong', 'Cap nhap vi tri product menu thanh cong');
            return redirect()->route('admin.locationproductmenu.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationproductmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $locationproductmenu = Locationproductmenu::where('id', $id)->first();
            if (!$locationproductmenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                return redirect()->route('admin.locationproductmenu.index')->with('error', 'Khong tim thay danh muc!');
            }
            $locationproductmenu->delete();
            Alert::success('Thanh cong', 'Xoa vi tri menu thanh cong');
            return redirect()->route('admin.locationproductmenu.index')->with('success', 'Xoa thanh cong thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationproductmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
