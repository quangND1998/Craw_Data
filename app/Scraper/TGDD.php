<?php

namespace App\Scraper;

use App\Models\CategoryPost;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Post;

use function PHPUnit\Framework\isEmpty;

class TGDD
{

    public function scrape()
    {
        $url = 'https://www.thegioididong.com/dong-ho-thong-minh';
        $catergorys = CategoryPost::get();
        // dd($catergorys);
        foreach($catergorys as $cate){
            $client = new Client();

            // $crawler = $client->request('GET', $url.Str::slug($cate->name));
    
            $crawler = $client->request('GET', $url);
            $crawler->filter('ul.homeproduct  li')->each(
                function (Crawler $node) {
                    // $name = $node->filter('.title-news')->each(function($node){
                    //     return $node->text();
                    // });
                    // $description = $node->filter('.description')->each(function($node){
                    //     return $node->text();
                    // });
                    // $url = $node->filter('.description a')->each(function($node){
                    //     return $node->attr('href');
                    // });
                    $name = $node->filter("h3")->text();
                    $info = $node->filter(".props span")->first()->text();
                    if(isEmpty( $info)){
                        $info =null;
                    }
                    $display =  $node->filter(".props span")->last()->text();
                    if(isEmpty($display)){
                        $display =null;
                    }
                    $sale_price = $node->filter(".price strong")->text();
     
                    $post = new Post();
                    $post->title = $name;
                    $post->info = $info;
                    $post->display =$display;
                    $post->sale_price =$sale_price;
            
                    $post->save();
                  
                }
            );
       
      
           
        
     
            
            
        }
  
        
    }
}