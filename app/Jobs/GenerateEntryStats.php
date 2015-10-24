<?php

namespace App\Jobs;

use App\Entry;
use App\Stat;
use App\Jobs\Job;
use App\Willpsng\RID;
use Crypt;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateEntryStats extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $entry;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Entry $entry)
    {
        $this->entry = $entry;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $entry = $this->entry;
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

        if ($emotions) {
            foreach ($emotions as $section) {
                foreach ($section as $bit) {
                    $e[$bit[0]] = $bit[1];
                }
                $emo['Emotions'] = $e;
            }
        }

        if ($primary) {
            if ($secondary) {
                $result = array_merge($prim, $sec);
            } else {
                $result = $prim;
            }
        } else {
            $result = "null";
        }

        // Bad code, outside of other if arrangement only because calculating emotions usually takes more words.

        if ($emotions) {
            $result = array_merge($result, $emo);
        }

        $result = json_encode($result);
        $result = preg_replace('/\B([A-Z])/', ' $1', $result);
        $result = json_decode($result, true);

        $result = serialize($result);

        $stat = new Stat;
        $stat->entry_id = $this->entry->id;
        $stat->stats_payload = $result;
        $stat->save();

    }
}
