The final output of the script should be an array of objects similar to the example below:

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
git clone
cd web-scrapping-application
composer install
```
To run the scrape you can use `php src/Scrape.php`
