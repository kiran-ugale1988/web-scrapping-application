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

###Additionally added rector for code refactoring
###Rector link https://getrector.com/documentation
* To install fresh: composer require rector/rector --dev
* First Time Run: vendor/bin/rector
* To see preview of suggested changed, run process command with --dry-run option: vendor/bin/rector process --dry-run
* To make changes happen, run bare command: vendor/bin/rector process


### Contributing
* Fork it on GitHub!
* Clone the fork to your own machine.
* Checkout your feature branch: git checkout -b my-awesome-feature
* Commit your changes to your own branch: git commit -am 'Add some feature'
* Push your work back up to your fork: git push -u origin my-awesome-feature
* Submit a Pull Request so that I can review your changes.

### OutPut
To run the scrape you can use `php src/Scrape.php`
```json
[
  {
    "title": "iPhone 11 Pro 64GB",
    "price": 799.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/iphone-11-pro.png",
    "capacityMB": 64000,
    "colour": "Green",
    "availabilityText": "Out of Stock",
    "isAvailable": false,
    "shippingText": null,
    "shippingDate": null
  },
  {
    "title": "iPhone 11 64GB",
    "price": 699.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/iphone-11.png",
    "capacityMB": 64000,
    "colour": "Black",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Unavailable for delivery",
    "shippingDate": null
  },
  {
    "title": "iPhone 11 64GB",
    "price": 699.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/iphone-11.png",
    "capacityMB": 64000,
    "colour": "White",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Unavailable for delivery",
    "shippingDate": null
  },
  {
    "title": "iPhone 12 Pro Max 128GB",
    "price": 1099.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/iphone-12-pro.png",
    "capacityMB": 128000,
    "colour": "Sky Blue",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Delivery by 26 Sep 2024",
    "shippingDate": "2024-09-26"
  },
  {
    "title": "Samsung Galaxy S20 128GB",
    "price": 849.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/s-20.png",
    "capacityMB": 128000,
    "colour": "Grey",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Available on 2 Oct 2024",
    "shippingDate": "2024-10-02"
  },
  {
    "title": "Huawei P30 Pro 128GB",
    "price": 699.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/p-30.png",
    "capacityMB": 128000,
    "colour": "Black",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Free Shipping",
    "shippingDate": null
  },
  {
    "title": "Nokia 3310 100MB",
    "price": 99.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/nokia-3310.png",
    "capacityMB": 100,
    "colour": "Orange",
    "availabilityText": "Out of Stock",
    "isAvailable": false,
    "shippingText": "Delivery from 25 Oct 2024",
    "shippingDate": "2024-10-25"
  },
  {
    "title": "Nokia 3310 100MB",
    "price": 99.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/nokia-3310.png",
    "capacityMB": 100,
    "colour": "Yellow",
    "availabilityText": "Out of Stock",
    "isAvailable": false,
    "shippingText": "Delivery from 25 Oct 2024",
    "shippingDate": "2024-10-25"
  },
  {
    "title": "Nokia 3310 100MB",
    "price": 99.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/nokia-3310.png",
    "capacityMB": 100,
    "colour": "Grey",
    "availabilityText": "Out of Stock",
    "isAvailable": false,
    "shippingText": "Delivery from 25 Oct 2024",
    "shippingDate": "2024-10-25"
  },
  {
    "title": "Nokia 3310 100MB",
    "price": 99.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/nokia-3310.png",
    "capacityMB": 100,
    "colour": "Blue",
    "availabilityText": "Out of Stock",
    "isAvailable": false,
    "shippingText": "Delivery from 25 Oct 2024",
    "shippingDate": "2024-10-25"
  },
  {
    "title": "Google Pixel 5 256GB",
    "price": 749.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/pixel-5.png",
    "capacityMB": 256000,
    "colour": "Black",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Delivers 25 Sep 2024",
    "shippingDate": "2024-09-25"
  },
  {
    "title": "Sony Xperia 10 32GB",
    "price": 449.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/sony-xperia.png",
    "capacityMB": 32000,
    "colour": "Black",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Free Shipping",
    "shippingDate": null
  },
  {
    "title": "Samsung Galaxy Flip 128GB",
    "price": 1699.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/flip.png",
    "capacityMB": 128000,
    "colour": "Slate Grey",
    "availabilityText": "Out of Stock",
    "isAvailable": false,
    "shippingText": null,
    "shippingDate": null
  },
  {
    "title": "Samsung Galaxy S20 128GB",
    "price": 849.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/s-20.png",
    "capacityMB": 128000,
    "colour": "Black",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Free Delivery 26 Sep 2024",
    "shippingDate": "2024-09-26"
  },
  {
    "title": "Oppo Reno4 Pro 5G 64GB",
    "price": 749.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/oppo-reno.png",
    "capacityMB": 64000,
    "colour": "Blue",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Free Delivery",
    "shippingDate": null
  },
  {
    "title": "Huawei P Smart 64GB",
    "price": 399.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/huawei-p-smart.png",
    "capacityMB": 64000,
    "colour": "Black",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Free Delivery tomorrow",
    "shippingDate": null
  },
  {
    "title": "Google Pixel 4 64GB",
    "price": 499.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/pixel-5.png",
    "capacityMB": 64000,
    "colour": "Black",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Delivers 25 Sep 2024",
    "shippingDate": "2024-09-25"
  },
  {
    "title": "Google Pixel 4 64GB",
    "price": 499.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/pixel-5.png",
    "capacityMB": 64000,
    "colour": "White",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Delivers 25 Sep 2024",
    "shippingDate": "2024-09-25"
  },
  {
    "title": "LG K42 128GB",
    "price": 499.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/lg-k42.png",
    "capacityMB": 128000,
    "colour": "Black",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Order within 6 hours and have it 27 Sep 2024",
    "shippingDate": "2024-09-27"
  },
  {
    "title": "Samsung Galaxy S20 64GB",
    "price": 799.99,
    "imageUrl": "https://www.magpiehq.com/developer-challenge/images/s-20.png",
    "capacityMB": 64000,
    "colour": "Grey",
    "availabilityText": "In Stock",
    "isAvailable": true,
    "shippingText": "Free Delivery 2024-09-26",
    "shippingDate": "2024-09-26"
  }
] 
```
