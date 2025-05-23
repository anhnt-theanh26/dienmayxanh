<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function saveAddress(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!$user) {
            Alert::error('Khong tim thay user:');
            return redirect()->route('index')->with('error', 'Khong tim thay user');
        }
        if(empty($request->allDressHiding)){
            Alert::error('Cập nhập thất bại', 'Cập nhập địa chỉ thất bại');
            return redirect()->route('index');
        }
        $user->address = $request->input('allDressHiding');
        $user->save();
        Alert::success('Cập nhập thành công', 'Cập nhập địa chỉ thành công');
        return redirect()->route('index');
    }
}
