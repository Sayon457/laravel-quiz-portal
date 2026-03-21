<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $categories = Category::get();
        return view('welcome', ['categories' => $categories]);
    }
}
