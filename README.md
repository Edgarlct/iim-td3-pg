# IIM TD3 - Scrap Le Denicheur

[![Last version](https://img.shields.io/packagist/v/edgarlct/td-3?maxAge=3600)](https://packagist.org/packages/edgarlct/td-3)

## Installation

```bash
composer require edgarlct/td-3
```

## Local development

```bash
composer install
```

Check code quality:
```bash
 composer check
```

Fix code quality:
```bash
 composer fix
```

Run tests:
```bash
composer test
```

## Usage

This library is used to scrap the website [Le Denicheur](https://ledenicheur.fr/).
In this release, you can search all products by search string and the library will return a list of products entities.
You can get the price, the ranking and the link of the product.
```php
<?php

use Iim\td3\Api;


require_once __DIR__ . '/../vendor/autoload.php';

$api = new Api();
try {
    $products = $api->getProductResearch("iphone");

} catch (Throwable $e) {
    echo $e->getMessage();
}
```
