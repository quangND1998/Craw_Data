<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Scraper\CrawData;
use App\Scraper\TGDD;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:crawl';

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
     * @return int
     */
    public function handle()
    {
        $bot = new CrawData();
        $bot->scrape();
    }
}
