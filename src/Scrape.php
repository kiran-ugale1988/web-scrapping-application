<?php

namespace App;

require 'vendor/autoload.php';

class Scrape
{
    private array $products = [];

    public function run(): void
    {
        $scrapeUrl = 'add your scrape web url here';
        $baseImageUrl = 'add your base image url to store full image url';

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
