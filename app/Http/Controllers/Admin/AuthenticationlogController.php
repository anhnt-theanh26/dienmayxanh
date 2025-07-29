<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Authentication_log;
use App\Models\AuthenticationLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticationlogController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('index authentication')) {
            $authenticationlogs = Authentication_log::orderByDesc('id')->paginate(10);
            return view("admin.page.authenticationlog.index", compact("authenticationlogs"));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
    public function search(Request $request, string $keyword)
    {
        if (Auth::user()->can('index authentication')) {
            $status = $request->status;
            if ($status == 'index') {
                $results = Authentication_log::join('users', 'users.id', '=', 'authentication_log.authenticatable_id')
                    ->where(function ($query) use ($keyword) {
                        $query->where('users.name', 'like', "%$keyword%")
                            ->orWhere('users.email', 'like', "%$keyword%")
                            ->orWhere('users.phone', 'like', "%$keyword%");
                    })
                    ->orderByDesc('id')
                    ->select('authentication_log.*')
                    ->paginate(10);
                if ($keyword == ' ') {
                    $results = Authentication_log::orderByDesc('id')->paginate(10);
                }
            }
            return view('admin.page.authenticationlog.search', compact('results', 'status'));
        } else {
            Alert::error('Không có quyền truy cập');
            return redirect()->route('admin.dashboard');
        }
    }
}
