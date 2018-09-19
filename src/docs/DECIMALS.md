# decimals

Determine whether or not the given number has (n) decimal point places or not.

### Notes

* Also accepts negative numbers.
* (n) can't be 0. If you need to do so, please refer to [Laravel Validation Rules](https://laravel.com/docs/5.6/validation).

### Usage

```php
'field_name' => 'decimals:n[,optional_decimals]',
```

Where (n=1,2,3,...) is the number of allowed decimal point places.
