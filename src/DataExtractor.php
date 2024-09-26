<?php

namespace App;

use Symfony\Component\DomCrawler\Crawler;
use App\Product;

/**
 * Class DataExtractor
 *
 * This class is responsible for extracting product-related data from an individual product node
 * on a webpage. It uses Symfony's DomCrawler to navigate through the DOM and retrieve specific
 * attributes like product title, price, capacity, colors, availability, and shipping date.
 */
class DataExtractor
{
    private Crawler $node;
    private string $baseImageUrl;

    /**
     * DataExtractor constructor.
     *
     * @param Crawler $node    The Crawler object representing the product node in the DOM.
     * @param string $baseUrl  The base URL of the website, used to construct full image URLs.
     */
    public function __construct(Crawler $node, string $baseImageUrl)
    {
        $this->node = $node;
        $this->baseImageUrl = $baseImageUrl;
    }

    /**
     * Extracts all relevant product information and returns a Product object.
     *
     * @return Product
     */
    public function extractProduct(): Product
    {
        $title = $this->extractTitle();
        $capacityText = $this->extractCapacity();
        $title = $title. ' '.str_replace(' ','',$capacityText);
        $capacityMB = $this->convertCapacityToMB($capacityText);
        $imageUrl = $this->extractImageUrl();
        $price = $this->extractPrice();
        $colours = $this->extractColours();
        $availabilityText = $this->extractAvailabilityText();
        $isAvailable = $this->isAvailable($availabilityText);
        $availabilityText = $isAvailable ? 'In Stock' : 'Out of Stock';
        $shippingDate = $this->extractShippingDate();
        $shippingText = $this->extractShippinText();
        return new Product(
            $title,
            $price,
            $imageUrl,
            $capacityMB,
            implode(', ', $colours),
            $availabilityText,
            $isAvailable,
            $shippingText,
            $shippingDate
        );
    }

    private function extractTitle(): string
    {
        return $this->node->filter('.bg-white h3 .product-name')->text();
    }

    /**
     * Extracts the product capacity (e.g., "64GB", "128GB") from the node.
     *
     * @return string  The raw capacity as a string.
     */
    private function extractCapacity(): string
    {
        return $this->node->filter('.bg-white h3 .product-capacity')->text();
    }

    /**
     * Converts the product capacity (e.g., "64GB", "128GB") to an integer in megabytes (MB).
     *
     * @param string $capacity  The raw capacity string (e.g., "64GB").
     * @return int              The capacity in MB.
     */
    private function convertCapacityToMB(string $capacity): int
    {
        if (stripos($capacity, 'GB') !== false) {
            return (int) filter_var($capacity, FILTER_SANITIZE_NUMBER_INT) * 1000;
        }
        return (int) filter_var($capacity, FILTER_SANITIZE_NUMBER_INT);
    }

    private function extractImageUrl(): string
    {
        return $this->baseImageUrl . ltrim($this->node->filter('img')->attr('src'), '/.');
    }

    private function extractPrice(): float
    {
        $priceText = $this->node->filter('.text-lg')->text();
        return (float) filter_var($priceText, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    private function extractColours(): array
    {
        $colours = [];
        $this->node->filter('[data-colour]')->each(function (Crawler $colourNode) use (&$colours) {
            $colours[] = $colourNode->attr('data-colour');
        });
        return $colours;
    }

    /**
     * Extracts the product availability status text (e.g., "In Stock" or "Out of Stock").
     *
     * @return string  The availability status.
     */
    private function extractAvailabilityText(): string
    {
        return $this->node->filter('.text-sm')->eq(0)->text();
    }

    /**
     * Determines whether the product is in stock based on the availability text.
     *
     * @param string $availabilityText  The availability status text.
     * @return bool                     True if the product is in stock, false otherwise.
     */
    private function isAvailable(string $availabilityText): bool
    {
        return (strpos($availabilityText, 'In Stock') !== false) ? true : false;
    }

    /**
     * Extracts the product shipping information the node, if availabl
     *
     * @return string|null  The shipping information like Delivery from 2024-10-25,Delivers Wednesday etc
     */
    private function extractShippinText(): ?string
    {
        if ($this->node->filter('.text-sm')->count() > 1) {
            return $this->node->filter('.text-sm')->eq(1)->text();
        }
        return null;
    }

    /**
     * Extracts the product shipping date from the node, if available. The shipping date is in the format "DD Month YYYY".
     *
     * @return string|null  The shipping date in 'Y-m-d' format, or null if not found.
     */
    private function extractShippingDate(): ?string
    {
        if ($this->node->filter('.text-sm')->count() > 1) {
            $shippingText = $this->node->filter('.text-sm')->eq(1)->text();
            if (preg_match('/(\d{4}-\d{2}-\d{2})|(\d{1,2}(?:st|nd|rd|th)?\s+\w+\s+\d{4})/', $shippingText, $matches)) {
                // Check if the matched date is in ISO format
                if (preg_match('/\d{4}-\d{2}-\d{2}/', $matches[0])) {
                    return date('Y-m-d', strtotime($matches[0]));
                } else {
                    // Remove the ordinal suffix before converting to date
                    $dateString = preg_replace('/(\d{1,2})(st|nd|rd|th)/', '$1', $matches[0]);
                    return date('Y-m-d', strtotime($dateString));
                }
            }
        }
        return null;
    }
}