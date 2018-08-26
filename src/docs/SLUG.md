# slug

Determine whether the given value is a valid slug or not.

## Contents

* [Syntax](#syntax)
* [Options](#options)
* [Examples](#examples)

### Syntax

```php
slug[:intl]
```

### Options

- `intl`
This option enables you to check against letters and digits from other languages (see [Unicode Categories](https://www.regular-expressions.info/unicode.html)).

### Examples

- If you want your slugs to contain only English letters `basic latin characters`:

```php
'field_name' => 'slug',
```

- If you want your slugs to contain letters from various languages:

```php
'field_name' => 'slug:intl',
```
