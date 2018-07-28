# LVRules

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This is a set of useful extra validation methods for the [Laravel](https://laravel.com) framework.

## Contents

- [Note](#note)
- [Installation](#installation)
- [Rules](#rules)
- [Languages](#languages)
- [Contributing](#contributing)
- [Security](#security)
- [License](#license)

## Note

Rules included in this package written by me (or other contributers) where not a part of [Laravel](https://laravel.com) validation rules at the time they where written. They are a collection of rules that where needed by me or others at that time, please see [Laravel](https://laravel.com) docs first before using any of rules in this package.

## Installation

Via Composer

``` bash
$ composer require moharrum/lvrules
```

Edit `config/app.php` and add the `provider`

```php
    'providers' => [
        Moharrum\LVRules\LVRulesServiceProvider::class,
    ]
```

## Rules

1. [alpha_num_space](src/docs/ALPHA_NUM_SPACE.md).
1. [alpha_space](src/docs/ALPHA_SPACE.md).
1. [decimals](src/docs/DECIMALS.md).
1. [even](src/docs/EVEN.md).
1. [fails](src/docs/FAILS.md).
1. [finite](src/docs/FINITE.md).
1. [infinite](src/docs/INFINITE.md).
1. [lowercase](src/docs/LOWERCASE.md).
1. [max_words](src/docs/MAX_WORDS.md).
1. [min_words](src/docs/MIN_WORDS.md).
1. [odd](src/docs/ODD.md).
1. [passes](src/docs/PASSES.md).
1. [tld](src/docs/TLD.md).
1. [uppercase](src/docs/UPPERCASE.md).

## Languages

Publishing the language files:

```php
php artisan vendor:publish
```

Published files can be found at `/resources/lang/vendor/meme-utils`.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email khalid.moharram@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/moharrum/lvrules.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/moharrum/lvrules.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/moharrum/lvrules
[link-downloads]: https://packagist.org/packages/moharrum/lvrules
[link-author]: https://github.com/moharrum
