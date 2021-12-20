<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Loan;
use Illuminate\Support\Facades\Log;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $today = Carbon::today('GMT+7');

            // HAPUS LOAN YANG SUDAH 7 HARI TIDAK DIRESPON
            Loan::where('created', '<', $today->subDays(7))->whereNull('app_signed')->delete();

            Log::info('Daily Cronjob Successfully Run : ' . $today->toDateTimeString());
        })->daily()->timezone('Asia/Jakarta');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
