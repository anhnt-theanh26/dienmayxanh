<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationbannermenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LocationBannerMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locationbannermenus = Locationbannermenu::get();
        return view("admin.page.locationbannermenu.index", compact('locationbannermenus'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.locationbannermenu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            $originalSlug = Str::slug($request->name);
            $slug = $originalSlug;
            $count = 1;
            while (Locationbannermenu::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $data = [
                'name' => $request->name,
                'slug' => $slug,
                'status' => $request->has('status') ? true : false,
            ];
            Locationbannermenu::create($data);
            Alert::success('Thanh cong', 'Them moi vi tri banner menu thanh cong');
            return redirect()->route('admin.locationbannermenu.index')->with('success', 'Thêm mới vị trí banner menu thành công');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationbannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
            $locationbannermenu = Locationbannermenu::where('id', $id)->first();
            if (!$locationbannermenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                return redirect()->route('admin.locationbannermenu.index')->with('error', 'Khong tim thay danh muc!');
            }
            return view("admin.page.locationbannermenu.edit", compact('locationbannermenu'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationbannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            $locationbannermenu = Locationbannermenu::where('id', $id)->first();
            if (!$locationbannermenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                return redirect()->route('admin.locationbannermenu.index')->with('error', 'Khong tim thay danh muc!');
            }
            $originalSlug = Str::slug($request->name);
            $newSlug = $originalSlug;
            $count = 1;
            while (
                Locationbannermenu::where('id', $newSlug)->where('slug', '!=', $locationbannermenu->slug)->exists()
            ) {
                $newSlug = $originalSlug . '-' . $count++;
            }
            $data = [
                'name' => $request->name,
                'slug' => $newSlug,
                'status' => $request->has('status') ? true : false,
            ];
            $locationbannermenu->update($data);
            Alert::success('Thanh cong', 'Cap nhap vi tri banner menu thanh cong');
            return redirect()->route('admin.locationbannermenu.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationbannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $locationbannermenu = Locationbannermenu::where('id', $id)->first();
            if (!$locationbannermenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                return redirect()->route('admin.locationbannermenu.index')->with('error', 'Khong tim thay danh muc!');
            }
            $locationbannermenu->delete();
            Alert::success('Thanh cong', 'Xoa vi tri menu thanh cong');
            return redirect()->route('admin.locationbannermenu.index')->with('success', 'Xoa thanh cong thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationbannermenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
