<?php

namespace App\Http\Controllers;

use Auth;
use App\Entry;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function contribs()
    {
        if (Auth::check()) {
            $entries = Auth::user()->entries()->where('word_count', '>', 0)->get();
            $contribs = [];
            $value = 1;

            foreach ($entries as $entry) {
                $timestamp = date_timestamp_get(Carbon::createFromFormat('Y-m-d', $entry->entry_date));
                $contribs[$timestamp] = $value;
            }

            return $contribs;
        } else {
            abort(401);
        }
    }
}
