<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // return 'Hello Admin! 👋';
        if (Auth::user()->can('index dashboard')) {
            return view("admin.page.main");
        } else {
            // abort(403, 'Không có quyền truy cập');
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Alert::error('Không có quyền truy cập');
            return redirect()->route('index');
        }
    }

    public function welcome(Request $request)
    {
        return $request;
    }
    public function test()
    {
        $attributes = Attribute::orderBy('id', 'desc')->get();
        return view('test', compact('attributes'));
    }

    function image()
    {
        if (Auth::user()->can('index image')) {
            return view('admin.page.image.index');
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
