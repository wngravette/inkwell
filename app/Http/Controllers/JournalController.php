<?php

namespace App\Http\Controllers;

use App\Entry;
use App\User;
use Auth;
use Carbon\Carbon;
use Crypt;
use Uuid;

class JournalController extends Controller
{
    public function home()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $date = Carbon::now()->format('l, jS F');
        $entryDate = Carbon::now()->format('Y-m-d');
        $currentEntry = $user->entries()->where('entry_date', $entryDate)->first();

        if ($currentEntry) {
            $currentEntry->entry_body = Crypt::decrypt($currentEntry->entry_body);
        } else {
            $currentEntry = new Entry();
            $currentEntry->entry_uuid = Uuid::generate();
            $currentEntry->user_id = Auth::user()->id;
            $currentEntry->entry_date = Carbon::now()->format('Y-m-d');
            $currentEntry->entry_body = Crypt::encrypt('');
            $currentEntry->save();

            $currentEntry = $user->entries()->where('entry_date', $entryDate)->first();
            $currentEntry->entry_body = Crypt::decrypt($currentEntry->entry_body);
        }

        // $time_left = Carbon::now()->diffForHumans(Carbon::parse('tomorrow midnight'), true);
        $midnight = Carbon::parse('tomorrow midnight')->format('c');

        return view('journal.home', [
                'date'         => $date,
                'todays_entry' => $currentEntry,
                // 'time_left' => $time_left,
                'midnight'  => $midnight,
                'page_name' => 'Home',
            ]);
    }
}
