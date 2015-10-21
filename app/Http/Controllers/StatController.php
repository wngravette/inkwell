<?php

namespace App\Http\Controllers;

use Auth;
use App\Entry;
use App\Stat;
use App\Willpsng\RID\RID;
use Carbon\Carbon;
use Crypt;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $entry = Entry::find($id);
        $stats = Stat::where('entry_id', $id)->first();
        $date = Carbon::parse($entry->entry_date)->format('l, jS F');

        if ($user->id !== $entry->user_id) {
            abort(403);
        }

        if (!$stats) {
            $no_stats = true;
            $data_primary = null;
            $data_secondary = null;
            $data_emotion = null;
        } else {
            $no_stats = false;

            $stats_payload = unserialize($stats->stats_payload);
            $data_primary = $stats_payload['Primary'];
            $data_secondary = $stats_payload['Secondary'];
            if (isset($stats_payload['Emotion'])) {
                $data_emotion = $stats_payload['Emotions'];
            } else {
                $data_emotion = null;
            }
        }
        return view('journal.dayview-stats', [
            'page_name' => 'Stats',
            'primary' => $data_primary,
            'secondary' => $data_secondary,
            'emotion' => $data_emotion,
            'no_stats' => $no_stats,
            'entry' => $entry,
            'date' => $date
            ]);
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
        //
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

}
