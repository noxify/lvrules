# username

Determine whether the given value is a valid username or not.

## Contents

* [Note](#Note)
* [Syntax](#syntax)
* [Options](#options)
* [Examples](#examples)

### Note

What defines a `username` according to this rule:

1. Does not contain white spaces.
1. Can only contain letters, numbers, dashes `(-)`, periods `(.)` and underscores `(_)`.

This rule does not validate username length or uniqueness. However, these rules can be found in [Core Laravel Validation Rules](https://laravel.com/docs/5.6/validation):

1. [Maximum length](https://laravel.com/docs/5.6/validation#rule-max).
1. [Minimum length](https://laravel.com/docs/5.6/validation#rule-min).
1. [Unique](https://laravel.com/docs/5.6/validation#rule-unique).

### Syntax

```php
username[:letters_do_lead]
```

### Options

- `letters_do_lead`
This option makes sure that the given username starts with a letter.

### Examples

- This will check if the username consists of letters, numbers and (`._-`) signs only:

```php
'field_name' => 'username',
```

- This will check if the username starts with letters and consists of letters, numbers and (`._-`) signs only:

```php
'field_name' => 'username:letters_do_lead',
```
