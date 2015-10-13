<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class APIController extends Controller
{
    public function contribs()
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $entries = $user->entries;
            $contribs = [];
            $value = 1;

            foreach ($entries as $entry) {
                $timestamp = date_timestamp_get($entry->updated_at);
                $contribs[$timestamp] = $value;
            }

            return $contribs;
        }
    }
}
