<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Jobs\GenerateEntryStats;
use App\Willpsng\RID;
use Auth;
use Carbon\Carbon;
use Crypt;
use Uuid;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::where('user_id', Auth::user()->id)->orderBy('entry_date', 'desc')->get();
        foreach ($entries as $entry) {
            $entry->entry_date_format = Carbon::parse($entry->entry_date)->format('l, jS F');
            $entry_date = Carbon::parse($entry->entry_date);

            if ($entry_date == Carbon::today() && $entry->is_signed == 0) {
                $entry->entry_status = "open";
            } elseif ($entry_date == Carbon::today() && $entry->is_signed == 1) {
                $entry->entry_status = "signed";
            } else {
                $entry->entry_status = "closed";
            }

            $start_time = Carbon::parse($entry->created_at);
            $finish_time = Carbon::parse($entry->updated_at);
            $entry->time_taken = $start_time->diffForHumans($finish_time, true);
        }

        return view('journal.entries', [
            'page_name' => 'Entries',
            'entries' => $entries,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entry = new Entry;
        $entry->entry_uuid = Uuid::generate();
        $entry->user_id = Auth::user()->id;
        $entry->entry_date = Carbon::now()->format('Y-m-d');
        $entry->entry_body = Crypt::encrypt($request->entry_body);
        $entry->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = Entry::find($id);
        $user = Auth::user();

        if ($user->id !== $entry->user_id) {
            abort(404);
        }

        $entry->entry_body = Crypt::decrypt($entry->entry_body);
        $entry->entry_body = preg_replace('/\n(\s*\n)+/', '</p><p>', $entry->entry_body);
        $entry->entry_body = preg_replace('/\n/', '<br>', $entry->entry_body);
        $date = Carbon::parse($entry->entry_date)->format('l, jS F');
        return view('journal.dayview', [
                    'page_name' => $date,
                    'entry' => $entry,
                    'date' => $date,
                ]);
    }

    public function showStats($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
        $entry = Entry::find($id);
        $entry->entry_body = Crypt::encrypt($request->entry_body);
        $entry->word_count = intval($request->word_count);
        $entry->save();
        $this->dispatch(new GenerateEntryStats($entry));
        } else {
            return false;
        }
    }

    public function sign($id)
    {
        if (Auth::check()) {
            $entry = Entry::find($id);
            $entry->is_signed = 1;
            $entry->save();
            $this->dispatch(new GenerateEntryStats($entry));
            return redirect('/journal')->with('msg', 'signed');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function findByDate($date)
    {
        $entry_date = Carbon::parse($date)->toDateString();
        $user = Auth::user();
        $entry = $user->entries()->where('entry_date', $entry_date)->first();
        if (!$entry) {
            abort(404);
        }
        return redirect('journal/entries/'.$entry->id);
    }

    public function stats()
    {
        $stats = new RID();
        $entry = Entry::find(17);
        $entry_body = Crypt::decrypt($entry->entry_body);
        $stats->analyze($entry_body);
        $data = $stats->retrieve_data(array('EMOTIONS'));

        return $data;
    }
}
