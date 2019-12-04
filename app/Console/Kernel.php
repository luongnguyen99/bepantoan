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
        'App\Console\Commands\CronjobCrawler',
        'App\Console\Commands\CronjobCrawlerDesc',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call('App\Http\Controllers\Client\CrawlerController@crawler_product_detail')->everyFiveMinutes();
        // $schedule->call('App\Http\Controllers\Client\CrawlerController@crawler_product_detail_order_desc')->everyMinute();
        // $schedule->command('demo:cron')->cron('5 * * * *');
        // $schedule->command('cronjob:desc')->cron('5 * * * *');
        // $schedule->command('demo:cron')->everyFiveMinutes();
        // $schedule->command('inspire')
        //          ->hourly();
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
