<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Authentication_log;
use App\Models\AuthenticationLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationlogController extends Controller
{
    // //
    public function index(){
        $authenticationlogs = Authentication_log::orderByDesc('id')->get();
        return view("admin.page.authenticationlog.index",compact("authenticationlogs"));
    }

    // public function getUser(string $id){
    //     $user = User::find($id);
    //     return $user;
    // }
}
