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
        $schedule->command('dailyCarriersSetUp')->weekdays()->at('14:45')->timezone('America/Chicago');
        $schedule->command('screamerCheck')->weekdays()->at('10:45')->timezone('America/Chicago');
        $schedule->command('brokerCallEmail')->weekdays()->twiceDaily(10, 14)->timezone('America/Chicago');
        $schedule->command('followUpScreamerEmail')->weekdays()->at('12:30')->timezone('America/Chicago');
        $schedule->command('weeklyCustomerTouch')->weekly()->thursdays()->at('10:00')->timezone('America/Chicago');
        $schedule->command('currentCarrierInspection')->daily()->at('13:41')->timezone('America/Chicago');

        

        
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
