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

Edit `config/app.php` and add the `provider` (only for Laravel 5.4 or below):

```php
    'providers' => [
        Moharrum\LVRules\LVRulesServiceProvider::class,
    ]
```

## Rules

- __[alpha_num_space](src/docs/ALPHA_NUM_SPACE.md)__ - Determine whether or not the given string consists of a combination of letters, numbers, spaces.
- __[alpha_space](src/docs/ALPHA_SPACE.md)__ - Determine whether or not the given string consists of a combination of letters and spaces.
- __[decimals](src/docs/DECIMALS.md)__ - Determine whether or not the given number has (n) decimal point places or not.
- __[even](src/docs/EVEN.md)__ - Validates if the given value is even number.
- __[fails](src/docs/FAILS.md)__ - Obviously, validation will always return false.
- __[finite](src/docs/FINITE.md)__ - Validates if the given is legal finite number.
- __[infinite](src/docs/INFINITE.md)__ - Validates if the given value is infinite.
- __[lowercase](src/docs/LOWERCASE.md)__ - Validates if the given string is in lowercase format.
- __[max_words](src/docs/MAX_WORDS.md)__ - Validates if the given string contains more than (n) number of words.
- __[min_words](src/docs/MIN_WORDS.md)__ - Validates if the given string contains at least (n) number of words.
- __[odd](src/docs/ODD.md)__ - Validates if the given value is odd.
- __[passes](src/docs/PASSES.md)__ - Obviously, validation will always return true.
- __[slug](src/docs/SLUG.md)__ - Validates if the given string is url slug.
- __[time](src/docs/TIME.md)__ - Validates if the given string is a time format.
- __[tld](src/docs/TLD.md)__ - Validates if the given string is a top level domain.
- __[unique_with](src/docs/UNIQUE_WITH.md)__ - Validates multi columns and values uniqueness.
- __[uppercase](src/docs/UPPERCASE.md)__ - Validates if the given string is in uppercase format.
- __[username](src/docs/USERNAME.md)__ - Validates if the given string is a username.

## Languages

Publishing the language files:

```php
php artisan vendor:publish
```

Published files can be found at `/resources/lang/vendor/lvrules`.

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
