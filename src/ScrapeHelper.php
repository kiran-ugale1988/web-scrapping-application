<?php

namespace App;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeHelper
{
    public static function fetchDocument(string $url): Crawler
    {
        $client = new Client();
        $response = $client->get($url);
        return new Crawler($response->getBody()->getContents(), $url);
    }

    public static function scrapeProducts(Crawler $crawler, $baseImageUrl): array
    {
        $products = [];
        // Get the total number of pages from the pagination
        $paginationLinks = $crawler->filter('#pages a')->count();
        // Loop through all pages
        for ($pageNumber = 1; $pageNumber <= $paginationLinks; $pageNumber++) {
            // Make the the URL for each page to scrap
            $pageUrl = $crawler->getBaseHref() . '/?page=' . $pageNumber;
            // Fetch and scrape each page
            self::scrapePage($pageUrl, $products, $baseImageUrl);
        }
        return $products;
    }

    private static function scrapePage(string $pageUrl, array &$products, $baseImageUrl)
    {
        $crawler = self::fetchDocument($pageUrl);
        // Extract product data
        $crawler->filter('.product')->each(function (Crawler $node) use (&$products, $baseImageUrl): void {
            $extractor = new DataExtractor($node, $baseImageUrl);
            $baseProduct = $extractor->extractProduct();
            // Extract color variants
            $node->filter('[data-colour]')->each(function (Crawler $colourNode) use (&$products, $baseProduct): void {
                $colour = $colourNode->attr('data-colour'); // Get the color variant
                // Create a new product for each color variant
                $variantProduct = new Product(
                    $baseProduct->getProductTitle(), // Modify the title to include the color
                    $baseProduct->getProductPrice(),
                    $baseProduct->getProductImageUrl(),
                    $baseProduct->getProductCapacityMB(),
                    $colour,
                    $baseProduct->getProductAvailabilityText(),
                    $baseProduct->getProductIsAvailable(),
                    $baseProduct->getProductShippingText(),
                    $baseProduct->getProductShippingDate()
                );

                // Check for duplicates based on a unique identifier
                $productExists = false;
                foreach ($products as $existingProduct) {
                    if ($existingProduct->getProductTitle() === $variantProduct->getProductTitle()
                        && $existingProduct->getProductColour() === $variantProduct->getProductColour()
                        && $existingProduct->getProductPrice() === $variantProduct->getProductPrice()) { // You can use other unique properties here
                        $productExists = true;
                        break; // Exit the loop if a duplicate is found
                    }
                }
                // Add the product to the list only if it's not a duplicate
                if (!$productExists) {
                    $products[] = $variantProduct;
                }
            });
        });
    }
}
