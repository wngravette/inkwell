<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function confirm($confirmation_code)
    {
        if(!$confirmation_code)
        {
           return "no code";
        }

        $user = User::where('confirmation_code', '=', $confirmation_code)->first();

        if (!$user)
        {
           return "no user";
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/journal');
    }
}
