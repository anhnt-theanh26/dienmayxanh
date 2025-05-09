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
    public function create(string $id)
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
            return view('admin.page.bannermenuitem.create', compact('bannermenu', 'bannermenuitems', 'categoryParents'));
        } catch (\Throwable $th) {
            Alert::error('Có lỗi xảy ra', text: $th->getMessage());
            return redirect()->route('admin.bannermenumenu.index')->with('error', 'Có lỗi xảy ra: ' . $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
