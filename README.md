# Hashids for Laravel 4.1

[![Latest Stable Version](https://poser.pugx.org/torann/hashids/v/stable.png)](https://packagist.org/packages/torann/hashids) [![Total Downloads](https://poser.pugx.org/torann/hashids/downloads.png)](https://packagist.org/packages/torann/hashids)

This package uses the classes created by [hashids.org](http://www.hashids.org/ "http://www.hashids.org/")

Generate hashes from numbers, like YouTube or Bitly. Use hashids when you do not want to expose your database ids to the user.

----------

## Installation

- [Hashids on Packagist](https://packagist.org/packages/torann/hashids)
- [Hashids on GitHub](https://github.com/torann/laravel-hashids)

To get the latest version of Hashids simply require it in your `composer.json` file.

~~~
"torann/hashids": "dev-master"
~~~

You'll then need to run `composer install` to download it and have the autoloader updated.

Once Hashids is installed you need to register the service provider with the application. Open up `app/config/app.php` and find the `providers` key.


```php
'Torann\Hashids\HashidsServiceProvider'
```

> There is no need to add the Facade, the package will add it for you.


### Publish the config

Run this on the command line from the root of your project:

	$ php artisan config:publish torann/hashids

This will publish Hashids' config to ``app/config/packages/torann/hashids/``.

## Usage

Once you've followed all the steps and completed the installation you can use Hashids.

### Encrypting

You can simply encrypt on id:

```php
Hashids::encrypt(1); // Returns Ri7Bi
```

or multiple..

```php
Hashids::encrypt(1, 21, 12, 12, 666); // Returns MMtaUpSGhdA
```

### Decrypting

```php
Hashids::decrypt(Ri7Bi);

// Returns
array (size=1)
0 => int 1
```

or multiple..

```php
Hashids::decrypt(MMtaUpSGhdA);

// Returns
array (size=5)
0 => int 1
1 => int 21
2 => int 12
3 => int 12
4 => int 666
```

All credit for Hashids goes to Ivan Akimov (@ivanakimov), thanks to for making it!