<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Mcq;
use App\Models\Quiz;
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
        $categories = Category::get();
        $admin = Session::get('admin');
        if ($admin) {
            return view('admin.categories', ['username' => $admin->username, "categories" => $categories]);
        } else {
            return redirect('admin-login');
        }
    }

    function logout()
    {
        Session::forget('admin');
        return redirect('admin-login');
    }

    function addCategory(Request $request)
    {
        $validation = $request->validate([
            "category" => 'required | min:2 | unique:categories,name'
        ]);
        $admin = Session::get('admin');
        $category = new Category();
        $category->name = $request->category;
        $category->creator = $admin->username;
        if ($category->save()) {
            Session::flash('category', "Category " . $request->category . " Added Successfully.");
        }
        return redirect('admin-categories');
    }

    function deleteCategory($id, Request $request)
    {
        $isDeleted = Category::find($id)->delete();
        if ($isDeleted) {
            Session::flash('category', "Success : Category " . $request->category . " Deleted.");
        }
        return redirect('admin-categories');
    }

    function addQuiz()
    {
        $categories = Category::get();
        $admin = Session::get('admin');
        $totalMCQs = 0;
        if ($admin) {
            $quizName = request('quiz');
            $category_id = request('category_id');

            if ($quizName && $category_id && !Session::has('quizDetails')) {
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if ($quiz->save()) {
                    Session::put('quizDetails', $quiz);
                }
            } else {
                $quiz = Session::get('quizDetails');
                $totalMCQs = $quiz && Mcq::where('quiz_id', $quiz->id)->count();
            }
            return view('addQuiz', ['username' => $admin->username, "categories" => $categories, "totalMCQs" => $totalMCQs]);
        } else {
            return redirect('admin-login');
        }
    }
    function addMCQs(Request $request)
    {
        $request->validate([
            "question" => "required | min:5",
            "option_a" => "required",
            "option_b" => "required",
            "option_c" => "required",
            "option_d" => "required",
            "correct_ans" => "required",

        ]);
        $mcq = new Mcq();
        $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');
        $mcq->question = $request->question;
        $mcq->option_a = $request->option_a;
        $mcq->option_b = $request->option_b;
        $mcq->option_c = $request->option_c;
        $mcq->option_d = $request->option_d;
        $mcq->correct_ans = $request->correct_ans;
        $mcq->quiz_id = $quiz->id;
        $mcq->admin_id = $admin->id;
        $mcq->category_id = $quiz->category_id;

        if ($mcq->save()) {
            if ($request->submit == "add-more") {
                return redirect(url()->previous());
            } else {
                Session::forget('quizDetails');
                return redirect('/admin-categories');
            }
        }
    }
    function endQuiz()
    {
        Session::forget('quizDetails');
        return redirect('/admin-categories');
    }
    function showQuiz($id, $quizName)
    {
        $admin = Session::get('admin');
        $mcqs =  Mcq::where('quiz_id', $id)->get();
        if ($admin) {
            return view('show-quiz', ['username' => $admin->username, "mcqs" => $mcqs, 'quizName' => $quizName]);
        } else {
            return redirect('admin-login');
        }
    }
    function quizList($id, $category)
    {
        $admin = Session::get('admin');
        if ($admin) {
            $quizData = Quiz::where('category_id', $id)->get();
            return view('quiz-list', ['username' => $admin->username, "quizData" => $quizData, "category" => $category]);
        } else {
            return redirect('admin-login');
        }
    }
}
