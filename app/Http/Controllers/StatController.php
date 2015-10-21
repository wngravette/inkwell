<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Stat;
use App\Other\RID\RID;
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
        //
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

    public function handle()
    {
        $id = 17;
        $entry = Entry::find($id);
        $stats = new RID();
        $entry_body = Crypt::decrypt($entry->entry_body);
        $stats->analyze($entry_body);
        $primary = $stats->retrieve_data(array('PRIMARY'));
        $secondary = $stats->retrieve_data(array('SECONDARY'));
        $emotions = $stats->retrieve_data(array('EMOTIONS'));

        foreach ($primary as $section) {
            foreach ($section as $bit) {
                $p[$bit[0]] = $bit[1];
            }
            $prim['Primary'] = $p;
        }

        foreach ($secondary as $section) {
            foreach ($section as $bit) {
                $s[$bit[0]] = $bit[1];
            }
            $sec['Secondary'] = $s;
        }

        foreach ($emotions as $section) {
            foreach ($section as $bit) {
                $e[$bit[0]] = $bit[1];
            }
            $emo['Emotions'] = $e;
        }

        $result = array_merge($prim, $sec);
        $result = array_merge($result, $emo);
        $result = serialize($result);

        $stat = new Stat;
        $stat->entry_id = $id;
        $stat->stats_payload = $result;
        $stat->save();

    }
}
