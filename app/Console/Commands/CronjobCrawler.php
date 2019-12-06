<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Client\CrawlerController;
use App\Models\Product;
class CronjobCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
        Product::whereIn('products.category_id',[22,24])->update([
            'products.gift' => '{"5327":{"value":"T\u1eb7ng D\u00c2Y GAS L\u00d5I TH\u1ebeP H\u00c0N QU\u1ed0C","link":"https:\/\/luongnd2286.xyz\/day-gas-loi-thep-han-quoc","image":"http:\/\/luongnd2286.xyz\/userfiles\/images\/2019-12-6%209-31-5.png"}}',
        ]);
    }
}
