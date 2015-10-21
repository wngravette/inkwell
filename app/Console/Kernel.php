<?php

namespace App\Console;

use App\Entry;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Delete empty entries
        $schedule->call(function () {
            $yesterday = Carbon::yesterday()->format('Y-m-d');
            $entries = Entry::where('entry_date', $yesterday)->where('word_count', 0)->get();
            $entries->delete();
        })->daily();

        // Create stats for entries
        $schedule->call(function () {
            $yesterday = Carbon::yesterday()->format('Y-m-d');
            $entries = Entry::where('entry_date', $yesterday)->get();
            foreach ($entries as $entry) {
                $this->dispatch(new GenerateEntryStats($entry));
            }
        })->daily();
    }
}
