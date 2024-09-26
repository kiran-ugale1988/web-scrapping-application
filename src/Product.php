<?php

namespace App;

/**
 * Class Product
 *
 * This class represents a product with its attributes and provides a method to convert the product
 * data into an associative array format. It encapsulates the product information and provides easy
 * access to its properties.
 */
class Product
{
    private string $title;
    private float $price;
    private string $imageUrl;
    private int $capacityMB;
    private string $colour;
    private string $availabilityText;
    private bool $isAvailable;
    private ?string $shippingText;
    private ?string $shippingDate;

    /**
     * Product constructor.
     *
     * Initializes a new instance of the Product class with the provided attributes.
     *
     * @param string $title            The title of the product.
     * @param float $price             The price of the product.
     * @param string $imageUrl         The URL of the product's image.
     * @param int $capacityMB          The storage capacity of the product in MB.
     * @param string $colour           The color of the product.
     * @param string $availabilityText  A description of the product's availability status.
     * @param bool $isAvailable        A boolean indicating whether the product is available.
     * @param string|null $shippingText Optional shipping information for the product.
     * @param string|null $shippingDate Optional shipping date for the product.
     */
    public function __construct(
        string $title,
        float $price,
        string $imageUrl,
        int $capacityMB,
        string $colour,
        string $availabilityText,
        bool $isAvailable,
        ?string $shippingText,
        ?string $shippingDate
    ) {
        $this->title = $title;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
        $this->capacityMB = $capacityMB;
        $this->colour = $colour;
        $this->availabilityText = $availabilityText;
        $this->isAvailable = $isAvailable;
        $this->shippingText = $shippingText;
        $this->shippingDate = $shippingDate;
    }

    /**
     * Converts the product's data into an associative array format.
     *
     * @return array  An associative array containing the product's attributes.
    */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'price' => $this->price,
            'imageUrl' => $this->imageUrl,
            'capacityMB' => $this->capacityMB,
            'colour' => $this->colour,
            'availabilityText' => $this->availabilityText,
            'isAvailable' => $this->isAvailable,
            'shippingText' => $this->shippingText,
            'shippingDate' => $this->shippingDate,
        ];
    }

    public function getProductTitle(): string
    {
        return $this->title;
    }

    public function getProductPrice(): float
    {
        return $this->price;
    }
    public function getProductImageUrl(): string
    {
        return $this->imageUrl;
    }
    public function getProductCapacityMB(): int
    {
        return $this->capacityMB;
    }

    public function getProductColour(): string
    {
        return $this->colour;
    }
    public function getProductAvailabilityText(): string
    {
        return $this->availabilityText;
    }
    public function getProductIsAvailable(): bool
    {
        return $this->isAvailable;
    }
    public function getProductShippingText(): ?string
    {
        return $this->shippingText;
    }
    public function getProductShippingDate(): ?string
    {
        return $this->shippingDate;
    }
}