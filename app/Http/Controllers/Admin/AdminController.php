<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{

    function login(Request $request)
    {
        $validation = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where([
            ['username', "=", $request->username],
            ['password', "=", $request->password],
        ])->first();

        if (!$admin) {
            $validation = $request->validate(
                [
                    'user' => 'required',
                ],
                [
                    'user.required' => "User does not exist."
                ]
            );
        }
        Session::put('admin', $admin);
        return redirect('/dashboard');
    }

    function dashboard()
    {
        $admin = Session::get('admin');
        if ($admin) {

            return view('admin.dashboard', ['username' => $admin->username]);
        } else {
            return redirect('admin-login');
        }
    }

    function categories()
    {
        $admin = Session::get('admin');
        if ($admin) {
            return view('admin.categories', ['username' => $admin->username]);
        } else {
            return redirect('admin-login');
        }
    }

    function logout()
    {
        Session::forget('admin');
        return redirect('admin-login');
    }
}
