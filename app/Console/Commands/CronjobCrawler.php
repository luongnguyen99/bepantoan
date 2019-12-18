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
        Product::whereIn('products.category_id',[21])->update([
            'products.gift' => '{"8076":{"value":"CH\u1ea2O CARO CH\u1ed0NG D\u00cdNH JOLLY EF S\u1ea6N SJ24","link":"https:\/\/bepantoan.pveser.com\/chao-caro-chong-dinh-jolly-ef-san-sj24","image":"http:\/\/bepantoan.pveser.com\/userfiles\/images\/chao-chong-dinh-sunhouse-SJ24%20(1).png"}}',
        ]);
    }
}
