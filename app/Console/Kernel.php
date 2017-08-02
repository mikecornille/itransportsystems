<?php

namespace App\Console;

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
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('02:00');
        $schedule->command('weeklyProfitReport')->weekly()->fridays()->at('12:00')->timezone('America/Chicago');
        $schedule->command('dailyCarriersSetUp')->daily()->at('14:45')->timezone('America/Chicago');
        $schedule->command('screamerCheck')->daily()->at('11:15')->timezone('America/Chicago');
        $schedule->command('brokerCallEmail')->twiceDaily(10, 14)->timezone('America/Chicago');
        $schedule->command('followUpScreamerEmail')->daily()->at('12:30')->timezone('America/Chicago');
        $schedule->command('weeklyCustomerTouch')->weekly()->wednesdays()->at('16:00')->timezone('America/Chicago');

        
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
