# Hashids for Laravel

[![Latest Stable Version](https://poser.pugx.org/torann/hashids/v/stable.png)](https://packagist.org/packages/torann/hashids) [![Total Downloads](https://poser.pugx.org/torann/hashids/downloads.png)](https://packagist.org/packages/torann/hashids)

This package uses the classes created by [hashids.org](http://www.hashids.org/ "http://www.hashids.org/")

Generate hashes from numbers, like YouTube or Bitly. Use hashids when you do not want to expose your database ids to the user.

----------

## Installation

- [Hashids on Packagist](https://packagist.org/packages/torann/hashids)
- [Hashids on GitHub](https://github.com/torann/laravel-hashids)

### Composer

From the command line run:

```bash
$ composer require torann/hashids
```

**Without Package Auto-Discovery**

Once Hashids is installed you need to register the service provider and facade with the application. Open up `config/app.php` and find the `providers` and `aliases` keys.

```php
'providers' => [
    Torann\Hashids\HashidsServiceProvider::class,
]

'aliases' => [
    'Hashids' => Torann\Hashids\Facade\Hashids::class,
]
```

### Publish the configurations

Run this on the command line from the root of your project:

```
$ php artisan vendor:publish --provider="Torann\Hashids\HashidsServiceProvider"
```

A configuration file will be publish to `config/hashids.php`.

## Usage

Once you've followed all the steps and completed the installation you can use Hashids.

### Encoding

You can simply encode a single id:

```php
Hashids::encode(1); // Returns Ri7Bi
```

or multiple..

```php
Hashids::encode(1, 21, 12, 12, 666); // Returns MMtaUpSGhdA
```

### Decoding

```php
Hashids::decode(Ri7Bi);

// Returns
array (size=1)
0 => int 1
```

or multiple..

```php
Hashids::decode(MMtaUpSGhdA);

// Returns
array (size=5)
0 => int 1
1 => int 21
2 => int 12
3 => int 12
4 => int 666
```

All credit for Hashids goes to Ivan Akimov (@ivanakimov), thanks to for making it!
