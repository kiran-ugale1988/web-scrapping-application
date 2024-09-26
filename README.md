## Magpie PHP Developer Challenge

Your task is to gather data about the products listed on https://www.magpiehq.com/developer-challenge/smartphones

The final output of your script should be an array of objects similar to the example below:

```
{
    "title": "iPhone 11 Pro 64GB",
    "price": 123.45,
    "imageUrl": "https://example.com/image.png",
    "capacityMB": 64000,
    "colour": "red",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Delivered from 25th March",
    "shippingDate": "2021-03-25"
}

```

I used repository as a starter template.

I shared `output.json` over email

### Notes
* Unique products condition handled.
* All product variants are captured.
* Each colour variant treated as a separate product
* Device capacity captured in MB for all products (not GB)
* Handled the pagination data
* I Followed quality of your code.

### Requirements

* PHP 7.4+
* Composer

### Setup

```
extract the zip file i.e. magpie-developer-challenge.zip
cd magpie-developer-challenge
composer install
```

To run the scrape you can use `php src/Scrape.php`
