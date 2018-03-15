<?php

namespace App\Console;

use App\User;

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

            $users = User::all()->count();

            echo "number of registered users - ".$users."\n";

            // foreach($users as $user){
            //
            //     $datetime1 = new \DateTime($user->created_at);
            //     $datetime2 = new \DateTime('2018-03-15');
            //     $interval = $datetime1->diff($datetime2);
            //     echo 'user registered '.$interval->format('%R%a days').' before'."\n";
            //     echo 'orders made by user '.$user->name.' - '.$user->orders()->count()."\n";
            // };

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }


}
