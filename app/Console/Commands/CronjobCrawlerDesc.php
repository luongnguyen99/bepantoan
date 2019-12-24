<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Client\CrawlerController;
class CronjobCrawlerDesc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronjob:desc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $request = Request::create($this->option('uri'), 'GET');
        // CrawlerController::index();
        CrawlerController::crawler_product_detail();
    }
}
