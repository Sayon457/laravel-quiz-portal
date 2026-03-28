<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    function index()
    {
        $categories = Category::withCount('quizzes')->get();
        return view('welcome', ['categories' => $categories]);
    }

    function userQuizList($id, $category)
    {
        $quizData = Quiz::withCount('Mcq')->where('category_id', $id)->get();
        return view('user-quiz-list', ['quizData' => $quizData, 'category' => $category]);
    }
    function startQuiz($id, $name)
    {
        $quizCount =  Mcq::where('quiz_id', $id)->count();
        $quizName = $name;
        return view('start-quiz', ['quizName' => $quizName, 'quizCount' => $quizCount]);
    }
    function userSignUp(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required | min:3',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:3 | confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            Session::put('user', $user);
            if (Session::has('quiz-url')) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url);
            }
            return redirect('/');
        }
    }
    function userLogout()
    {
        Session::forget('user');
        return redirect('/');
    }
    function userSignupQuiz()
    {
        Session::put('quiz-url', url()->previous());
        return view('user-signup');
    }
    function userLogin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return "User not valid, Please check your email and password";
        }
        if ($user) {
            Session::put('user', $user);
            if (Session::has('quiz-url')) {
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url)->with('message', 'User Logged In Successfully');
            }
            return redirect('/')->with('message', 'User Logged In Successfully');
        }
    }
    function userLoginQuiz()
    {
        Session::put('quiz-url', url()->previous());
        return view('user-login');
    }
}
