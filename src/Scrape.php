<?php

namespace App;

require 'vendor/autoload.php';

class Scrape
{
    private array $products = [];

    public function run(): void
    {
        $scrapeUrl = 'https://www.magpiehq.com/developer-challenge/smartphones';
        $baseImageUrl = 'https://www.magpiehq.com/developer-challenge/';

        $document = ScrapeHelper::fetchDocument($scrapeUrl);

        // Extract products from the document
        $this->products = ScrapeHelper::scrapeProducts($document,$baseImageUrl);
        // Convert products to array and save to JSON file
        $output = array_map(function($product) {
            return $product->toArray();
        }, $this->products);

        file_put_contents('output.json', json_encode($output));
    }
}

$scrape = new Scrape();
$scrape->run();
