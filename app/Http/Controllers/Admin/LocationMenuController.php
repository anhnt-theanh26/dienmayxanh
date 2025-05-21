<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationmenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LocationMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locationmenus = Locationmenu::all();
        return view("admin.page.locationmenu.index", compact('locationmenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.locationmenu.create');
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
            while (Locationmenu::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $data = [
                'name' => $request->name,
                'slug' => $slug,
                'status' => $request->has('status') ? true : false,
            ];

            Locationmenu::create($data);
            Alert::success('Thanh cong', 'Them moi vi tri menu thanh cong');
            return redirect()->route('admin.locationmenu.index')->with('success', 'Thêm mới vị trí menu thành công');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
            $locationmenu = Locationmenu::where('id', $id)->first();
            if (!$locationmenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                return redirect()->route('admin.locationmenu.index')->with('error', 'Khong tim thay danh muc!');
            }
            return view('admin.page.locationmenu.edit', compact('locationmenu'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
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
            $locationmenu = Locationmenu::where('id', $id)->first();
            if (!$locationmenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                return redirect()->route('admin.locationmenu.index')->with('error', 'Khong tim thay danh muc!');
            }
            $originalSlug = Str::slug($request->name);
            $newSlug = $originalSlug;
            $count = 1;
            while (
                Locationmenu::where('slug', $newSlug)->where('id', '!=', $locationmenu->id)->exists()
            ) {
                $newSlug = $originalSlug . '-' . $count++;
            }
            $data = [
                'name' => $request->name,
                'slug' => $newSlug,
                'status' => $request->has('status') ? true : false,
            ];
            $locationmenu->update($data);
            Alert::success('Thanh cong', 'Cap nhap vi tri menu thanh cong');
            return redirect()->route('admin.locationmenu.index')->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $locationmenu = Locationmenu::where('id', $id)->first();
            if (!$locationmenu) {
                Alert::error('Có lỗi xảy ra', 'Khong tim thay vi tri menu');
                return redirect()->route('admin.locationmenu.index')->with('error', 'Khong tim thay danh muc!');
            }
            $locationmenu->delete();
            Alert::success('Thanh cong', 'Xoa vi tri menu thanh cong');
            return redirect()->route('admin.locationmenu.index')->with('success', 'Xoa thanh cong thành công!');
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', $th->getMessage());
            return redirect()->route('admin.locationmenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }
}
