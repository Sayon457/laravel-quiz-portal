<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function login(Request $request)
    {
        $admin = Admin::where([
            ['username', "=", $request->username],
            ['password', "=", $request->password],
        ])->first();
        return view('admin.dashboard', ["username" => $admin->username]);
    }
}
