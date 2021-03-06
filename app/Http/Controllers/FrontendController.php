<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            return redirect('/journal');
        } else {
            return view('front.home', ['sign_up_btn' => true]);
        }
    }

    public function about()
    {
        return view('front.about', ['sign_up_btn' => true, 'page_name_on' => false]);
    }

    public function privacy()
    {
        return view('front.privacy', ['sign_up_btn' => true, 'page_name_on' => false]);
    }

    public function signup()
    {
        return view('auth.register', ['page_name' => 'Sign Up', 'sign_up_btn' => false, 'page_name_on' => false, 'login_state' => "signup"]);
    }

    public function login()
    {
        return view('auth.login', ['page_name' => 'Login', 'sign_up_btn' => false, 'page_name_on' => false, 'login_state' => "login"]);
    }
}
