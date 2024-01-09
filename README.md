# Welcome to Laravel Generator Package

This package is used to generate models, controllers, views, routes, migrations, seeders, factories, requests, and more for Laravel.

[![Latest Version](https://img.shields.io/github/release/cslant/laravel-generator.svg?style=flat-square)](https://github.com/cslant/laravel-generator/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/cslant/laravel-generator.svg?style=flat-square)](https://packagist.org/packages/cslant/laravel-generator)
[![StyleCI](https://styleci.io/repos/605697295/shield)](https://styleci.io/repos/605697295)
[![Quality Score](https://img.shields.io/scrutinizer/g/cslant/laravel-generator.svg?style=flat-square)](https://scrutinizer-ci.com/g/cslant/laravel-generator)
[![Maintainability](https://api.codeclimate.com/v1/badges/231c123bfa276fd1ac3c/maintainability)](https://codeclimate.com/github/cslant/laravel-generator/maintainability)

## Technology

- PHP ^7.3|^8.0
- Laravel Framework 8.x, 9.x, 10.x
- Composer

## Installation

You can install the package with [Composer](https://getcomposer.org/) using the following command:

```bash
composer require cslant/laravel-generator
```

## Publish the config file, views, and language files

If you want to change the default configuration, the views, or the language files, you can publish them with the following command:

```bash
 php artisan vendor:publish --provider="CSlant\LaravelGenerator\Providers\LaravelGeneratorServiceProvider" 
```

If you have run the above command, you will see the following files in your project:

- `config/laravel-generator.php`
- `resources/views/vendor/laravel-generator`

---

Also, you can publish only the config file with the following command:

```bash
 php artisan vendor:publish --provider="CSlant\LaravelGenerator\Providers\LaravelGeneratorServiceProvider" --tag="config" 
```

Similarly, you can publish only the views with the following command:

```bash
 php artisan vendor:publish --provider="CSlant\LaravelGenerator\Providers\LaravelGeneratorServiceProvider" --tag="views" 
```


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

<p align="center">
    <a href="https://packagist.org/packages/cslant/laravel-generator">
        <img src="https://img.shields.io/packagist/l/doctrine/orm.svg" data-origin="https://img.shields.io/packagist/l/doctrine/orm.svg" alt="license">
    </a>
</p>

