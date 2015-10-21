<?php

namespace App\Http\Controllers;

use App\Entry;
use App\User;
use Auth;
use Carbon\Carbon;
use Crypt;
use Uuid;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    public function home()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $date = Carbon::now()->format('l, jS F');
        $entryDate = Carbon::now()->format('Y-m-d');
        $currentEntry = $user->entries()->where('entry_date', $entryDate)->first();
        $msg = false;

        if ($currentEntry) {
            $currentEntry->entry_body = Crypt::decrypt($currentEntry->entry_body);
        } else {
            $currentEntry = new Entry;
            $currentEntry->entry_uuid = Uuid::generate();
            $currentEntry->user_id = Auth::user()->id;
            $currentEntry->entry_date = Carbon::now()->format('Y-m-d');
            $currentEntry->entry_body = Crypt::encrypt("");
            $currentEntry->save();

            $currentEntry = $user->entries()->where('entry_date', $entryDate)->first();
            $currentEntry->entry_body = Crypt::decrypt($currentEntry->entry_body);
        }

        if ($user->confirmed == 0) {
            $msg = "Please check your emails and verify your account.";
        }

        // $time_left = Carbon::now()->diffForHumans(Carbon::parse('tomorrow midnight'), true);
        $midnight = Carbon::parse('tomorrow midnight')->format('c');

        return view('journal.home', [
                'date' => $date,
                'msg' => $msg,
                'todays_entry' => $currentEntry,
                // 'time_left' => $time_left,
                'midnight' => $midnight,
                'page_name' => 'Home'
            ]);
    }

    public function stats()
    {
        if (Auth::user()->entries()->count() <= 2) {
            $stats_disabled = true;
        } else {
            $stats_disabled = false;
        }
        $words_this_month = [];
        $words_last_month = [];
        $avg_finish = [];
        $avg_time = [];
        $entry_bodies = [];
        $msg = false;
        $common_words = ['the','to','that','of','is','and','a','it','in','at','be'];

        $entries_this_month =  Auth::user()->entries()->where('created_at', '>=', Carbon::now()->startOfMonth())->get();
        foreach ($entries_this_month as $entry) {
            $parsed_date = Carbon::createFromFormat('Y-m-d', $entry->entry_date)->format('M. j');
            if ($entry->word_count == 0) {
                $words_this_month[$parsed_date] = "null";
            } else {
                $words_this_month[$parsed_date] = $entry->word_count;
            }
            $entry_fin = Carbon::parse($entry->updated_at)->format('Gi');
            array_push($avg_finish, $entry_fin);
            $start_time = Carbon::parse($entry->created_at);
            $finish_time = Carbon::parse($entry->updated_at);
            $time_taken = $start_time->diffInSeconds($finish_time);
            array_push($avg_time, $time_taken);
            array_push($entry_bodies, Crypt::decrypt($entry->entry_body));
        }

        $words_written_array = str_word_count(implode($entry_bodies), 1);
        $noncommon_words_written = array_diff($words_written_array, $common_words);
        $word_occ_counts = array_count_values($noncommon_words_written);
        arsort($word_occ_counts);
        $word_occ_counts = array_splice($word_occ_counts, 0, 6);

        $last_month_start = Carbon::parse('first day of last month');
        $last_month_end = Carbon::parse('last day of last month');
        $entries_last_month = Auth::user()->entries()->whereBetween('created_at', [$last_month_start, $last_month_end])->get();
        foreach ($entries_last_month as $entry) {
            array_push($words_last_month, $entry->word_count);
        }

        $avg_fin_time = round(collect($avg_finish)->avg());
        $avg_fin_time = Carbon::createFromFormat('Gi', $avg_fin_time)->format('g:i a');

        $avg_time = collect($avg_time)->avg();
        $avg_time = gmdate("h\h i\m", $avg_time);
        $avg_time = ltrim($avg_time, '0');

        $avg_words = round(collect($words_this_month)->avg());

        $word_count = collect($words_this_month)->sum();
        $previous_word_count = collect($words_last_month)->sum();


        return view('journal.stats', [
                'word_count' => $word_count,
                'word_counts' => $words_this_month,
                'prev_word_count' => $previous_word_count,
                'avg_fin' => $avg_fin_time,
                'avg_time' => $avg_time,
                'avg_words' => $avg_words,
                'common_words' => $word_occ_counts,
                'stats_disabled' => $stats_disabled,
                'msg' => $msg,
                'page_name' => 'Stats'
            ]);
    }
}
