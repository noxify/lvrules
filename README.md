# Utilities

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This is a set of useful extra validation methods for the [Laravel](https://laravel.com) framework.

## Contents

- [Note](#note)
- [Installation](#installation)
- [Rules](#rules)
- [Contributing](#contributing)
- [Security](#security)
- [License](#license)

## Note

Rules included in this package written by me (or other contributers) where not a part of [Laravel](https://laravel.com) validation rules at the time they where written. They are a collection of rules that where needed by me or others at that time, please see [Laravel](https://laravel.com) docs first before using any of rules in this package.

## Installation

Via Composer

``` bash
$ composer require moharrum/utilities
```

Edit `config/app.php` and add the `provider`

```php
    'providers' => [
        Moharrum\Utilities\UtilitiesServiceProvider::class,
    ]
```

Publishing the configuration file, this is where you can change the default table name

```php
php artisan vendor:publish
```

## Rules

1. [Alpha Num](docs/ALPHA_NUM.md).
1. [Alpha Num Space](docs/ALPHA_NUM_SAPCE.md).
1. [Min Words](docs/MIN_WORDS.md).
1. [Max Words](docs/MAX_WORDS.md).
1. [Passes](docs/PASSES.md).
1. [Fails](docs/FAILS.md).

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email khalid.moharram@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/moharrum/utilities.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/moharrum/utilities.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/moharrum/utilities
[link-downloads]: https://packagist.org/packages/moharrum/utilities
[link-author]: https://github.com/moharrum
