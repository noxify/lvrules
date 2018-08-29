# time

## Contents

* [Syntax](#syntax)
* [Options](#options)
* [Note](#note)

### Syntax

* 24-Hour Format:

```php
time:[24hr[,optional_seconds]]
```

* 12-Hour Format:

```php
time:[12hr
        [,no_meridiems[,no_seconds|optional_seconds|mandatory_seconds(default)]] |
        [,optional_meridiems[,no_seconds|optional_seconds|mandatory_seconds(default)]] |
        [,mandatory_meridiems(default)[,no_seconds|optional_seconds|mandatory_seconds(default)]]
    ]
```

* Military Format:

```php
time:[military[,no_colon|optional_colon(default)|mandatory_colon]]
```


### Options

- `24hr`
The field under validation must be in 24-Hour - `HH:mm:ss` - time format with mandatory seconds.

    - `optional_seconds`
    If you use this option, The field under validation may or may not contain `seconds`.

- `12hr`
The field under validation must be in 12-Hour - `hh:mm:ss AM|PM` - time format.

    - `no_meridiems`
    The field can not contain meridiems.

    - `optional_meridiems`
    The field may or may not contain meridiems.

    - `mandatory_meridiems` (default)
    The field must contain meridiems.

    - `no_seconds`
    The field can not contain `seconds`.

    - `optional_seconds`
    The field may or may not contain `seconds`.

    - `mandatory_seconds` (default)
    The field must contain `seconds`.

- `military`
The field under validation must be in military - `HH[:]mm` - time format.

    - `no_colon`
    The field can not contain `:` a colon.

    - `optional_colon` (default)
    The field may or may not contain `:` a colon.

    - `mandatory_colon`
    The field must contain `:` a colon.

### Note

If you do not specify any option from the above, the default options will be used.
