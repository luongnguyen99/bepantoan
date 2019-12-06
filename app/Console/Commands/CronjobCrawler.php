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
        Product::whereIn('products.category_id',[17,18])->update([
            'products.gift' => '{"5560":{"value":"T\u1eb7ng B\u1ed9 n\u1ed3i t\u1eeb Fivestar 5 chi\u1ebfc tr\u1ecb gi\u00e1 1.150.000 \u0111","link":"https:\/\/luongnd2286.xyz\/bo-noi-fivestar-5-mon-vung-kinh","image":"http:\/\/luongnd2286.xyz\/userfiles\/images\/10569106_846093875400964_7585170393470138753_nx200x200x4.jpg"}}',
        ]);
    }
}
