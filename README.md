# Laravel Cafebazaar API implementation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devability/laravel-cafebazaar.svg?style=flat-square)](https://packagist.org/packages/devability/laravel-cafebazaar)
[![Build Status](https://img.shields.io/travis/devability/laravel-cafebazaar/master.svg?style=flat-square)](https://travis-ci.org/devability/laravel-cafebazaar)
[![Quality Score](https://img.shields.io/scrutinizer/g/devability/laravel-cafebazaar.svg?style=flat-square)](https://scrutinizer-ci.com/g/devability/laravel-cafebazaar)
[![Total Downloads](https://img.shields.io/packagist/dt/devability/laravel-cafebazaar.svg?style=flat-square)](https://packagist.org/packages/devability/laravel-cafebazaar)

Cafebazaar uses a non standard implementation of `OAuth2.0`, with this package you can use cafebazaar api without all of the headache that it brings.

Also <a href="http://developers.cafebazaar.ir/fa/docs/">Official Documents</a> are not clear and not complete at all.

## Requirements

- Laravel 5.5 ~ 8.+

## Installation

You can install the package via composer:

```bash
composer require devability/laravel-cafebazaar
```

You have to publish the configuration

```bash
php artisan vendor:publish
# select [10] Provider: Devability\LaravelCafebazaar\LaravelCafebazaarServiceProvider
```  

## Usage


Add a redirect route

``` php
<?php
// add a redirect route for example routes/api.php
Route::get('/iap/redirect', function(Illuminate\Http\Request $request) {
    return \Devability\LaravelCafebazaar\LaravelCafebazaar::handleRedirect($request);
});

```

Open up <a href="https://pishkhan.cafebazaar.ir/">Cafebazaar developer panel</a> and create a new client with redirect url you specified

Configure `config/laravel-cafebazaar.php`

Then run

```bash
php artisan Cafebazaar code
```
Open up the link and authorize the application

``` php
<?php

namespace App\Http\Controllers;

use Devability\LaravelCafebazaar\LaravelCafebazaar;

...

class MyController extends Controller {
    function check() {
        $cafebazaar = new LaravelCafebazaar();
        $purchase = $cafebazaar->verifyPurchase('ir.devability.package_id', 'product_id', 'purchase_token');
        if($purchase->isValid()) {
            echo 'yay!';
        }
    }
}

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email nikandalvand@gmail.com instead of using the issue tracker.

## Credits

- [Nikan Dalvand](https://github.com/devability)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
