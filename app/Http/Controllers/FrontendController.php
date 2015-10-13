<?php

namespace App\Http\Controllers;

use Auth;

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

    public function signup()
    {
        return view('auth.register', ['page_name' => 'Sign Up', 'sign_up_btn' => false, 'page_name_on' => false, 'login_state' => 'signup']);
    }

    public function login()
    {
        return view('auth.login', ['page_name' => 'Login', 'sign_up_btn' => false, 'page_name_on' => false, 'login_state' => 'login']);
    }
}
