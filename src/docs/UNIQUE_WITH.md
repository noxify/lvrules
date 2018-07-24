# unique_with

## Contents

* [Syntax](#syntax)
* [Options](#options)
* [Note](#note)

### Syntax

```php
unique_with:tablename,attribute_1[:attribute_1_db_col_name],
                        attribute_2[:attribute_2_db_col_name],...
                        [,ignore:value,column:id]
                        [,connection:mysql]
                        [,where:col_1_name=value_1,where:col_2_name=value_2,...]
```


### Options

- `tablename`
Here is where you specify targeted table name.

- `attributes`
Depending on your form, you may have as many attributes as you need.
Note that if your attributes names are different from the database columns, you can specify column names explicitly.

```php
unique_with:tablename,attribute_1[:attribute_1_db_col_name][,attribute_2[:attribute_2_db_col_name]],...
```

- `ignore`
To force unique_with rule to ignore a given ID, you can use this option.

```php
unique_with:tablename,attribute_1[:attribute_1_db_col_name],...,ignore=ID
```

- `column`
To specify a custom column name for the ignored value. Defaults to `id`

```php
unique_with:tablename,attribute_1[:attribute_1_db_col_name],...,ignore=ID,column=my_custom_col_name
```

- `connection`
You may use this option to change default connection if needed.

```php
unique_with:tablename,attribute_1[:attribute_1_db_col_name],connection=my_custom_connection
```

- `where`
You may also specify additional query constraints by customizing the query using the `where` method.

```php
unique_with:tablename,attribute_1[:attribute_1_db_col_name][,where:col_1=val1,where:col2=val2,...]
```

### Note

If you do not specify any of the `attributes`, the method will validate the field under validation.
