<?php

namespace App\Scraper;

use App\Models\CategoryPost;
use App\Models\Product;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class CrawData{
    
    public function scrape()
    {
        $url = 'https://www.thegioididong.com/laptop';

        $client = new Client();

        $crawler = $client->request('GET', $url);
        $crawler->filter("ul.homeproduct li.item")->each(
            function (Crawler $node) {
                $name = $node->filter("h3")->text();
                $RAM = $node->filter(".props span")->first()->text();
                $ROM =  $node->filter(".props span")->last()->text();
                $sale_price = $node->filter(".price strong")->text();
                $price = $node->filter(".price span")->text();
                $gift = $node->filter(".promo")->text();

                    $product = new CategoryPost();
                    $product->name = $name;
                    $product->ram = $RAM;
                    $product->rom = $ROM;
                    $product->price_sales = $sale_price;
                    $product->price = $price;
                    $product->gift = $gift;
                    $product->save();

            }
        );
     
     
    }
}