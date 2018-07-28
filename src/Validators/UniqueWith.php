<?php

/**
 * Package author: Khalid Moharrum.
 *
 * PHP version 5, 7.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */

namespace Moharrum\LVRules\Validators;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Moharrum\LVRules\Exceptions\InvalidArgumentException;

/**
 * Handle unique with property validations.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */
class UniqueWith
{
    /**
     * @var string
     */
    protected $tablename;

    /**
     * Set table name property.
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setTablename($parameters)
    {
        if (! isset($parameters[0])) {
            throw new InvalidArgumentException('Unique With Validation Rule: invalid syntax, missing table name.');
        }

        $this->tablename = $parameters[0];
    }

    /**
     * Get table name property.
     *
     * @return string
     */
    public function getTablename()
    {
        return $this->tablename;
    }

    /**
     *
     * @var array
     */
    protected $columns;

    /**
     * Set columns property.
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setColumns($parameters)
    {
        $parametersCollect = collect($parameters);

        $parametersCollect->forget(0);

        $columns = $parametersCollect->filter(
            function ($parameter) {
                return (! Str::contains($parameter, 'connection:')) && (! Str::contains($parameter, 'ignore:')) && (! Str::contains($parameter, 'column:')) && (! Str::contains($parameter, 'where:'));
            }
        );

        $this->columns = array_map('trim', $columns->toArray());
    }

    /**
     * Get columns property.
     *
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Get table column name.
     *
     * @param string $column
     *
     * @return string
     */
    public function getTableColumnName($column)
    {
        if (! mb_strpos($column, ':')) {
            return $column;
        }

        return trim(mb_substr($column, mb_strpos($column, ':') + 1));
    }

    /**
     *
     * @var string
     */
    protected $connection;

    /**
     * Set connection property.
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setConnection($parameters)
    {
        $parametersCollect = collect($parameters);

        $connection = $parametersCollect->filter(
            function ($parameter) {
                return Str::contains($parameter, 'connection:');
            }
        );

        if (! $connection->count()) {
            $this->connection = config('database.default');

            return;
        }

        $connection = mb_substr($connection->first(), mb_strpos($connection->first(), ':') + 1);

        if (empty($connection)) {
            throw new InvalidArgumentException('Unique With Validation Rule: invalid syntax, connection name not supplied.');
        }

        $this->connection = trim($connection);
    }

    /**
     * Get connection property.
     *
     * @return string
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     *
     * @var string|null
     */
    protected $ignoredValue = null;

    /**
     * Set ignored value property.
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setIgnoredValue($parameters)
    {
        $parametersCollect = collect($parameters);

        $ignore = $parametersCollect->filter(
            function ($parameter) {
                return Str::contains($parameter, 'ignore:');
            }
        );

        if (! $ignore->count()) {
            return;
        }

        $ignored = mb_substr($ignore->first(), mb_strpos($ignore->first(), ':') + 1);

        if (empty($ignored)) {
            throw new InvalidArgumentException('Unique With Validation Rule: invalid syntax, ignored value not supplied.');
        }

        $this->ignoredValue = trim($ignored);
    }

    /**
     * Get ignored value property.
     *
     * @return string|null
     */
    public function getIgnoredValue()
    {
        return $this->ignoredValue;
    }

    /**
     * Determine whether ignored value is present or not.
     *
     * @return bool
     */
    public function hasIgnoredValue()
    {
        return (null != $this->ignoredValue);
    }

    /**
     *
     * @var string
     */
    protected $ignoredColumnName = 'id';

    /**
     * Set ignored column name property.
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setIgnoredColumnName($parameters)
    {
        $parametersCollect = collect($parameters);

        $ignore = $parametersCollect->filter(
            function ($parameter) {
                return Str::contains($parameter, 'column:');
            }
        );

        if (! $ignore->count()) {
            return;
        }

        $ignored = mb_substr($ignore->first(), mb_strpos($ignore->first(), ':') + 1);

        if (empty($ignored)) {
            throw new InvalidArgumentException('Unique With Validation Rule: invalid syntax, column name not supplied.');
        }

        $this->ignoredColumnName = trim($ignored);
    }

    /**
     * Get ignored column name property.
     *
     * @return string
     */
    public function getIgnoredColumnName()
    {
        return $this->ignoredColumnName;
    }

    /**
     *
     * @var array
     */
    protected $wheres;

    /**
     * Set wheres property.
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setWheres($parameters)
    {
        $parametersCollect = collect($parameters);

        $wheres = $parametersCollect->filter(
            function ($parameter) {
                return Str::contains($parameter, 'where:');
            }
        );

        $this->wheres = array_map('trim', $wheres->toArray());
    }

    /**
     * Get wheres property.
     *
     * @return array
     */
    public function getWheres()
    {
        return $this->wheres;
    }

    /**
     * Get where column name.
     *
     * @param string $where
     *
     * @return string
     */
    public function getWhereColumnName($where)
    {
        $string = mb_substr($where, mb_strpos($where, ':') + 1);

        return mb_substr($string, 0, mb_strpos($string, '='));
    }

    /**
     * Get where column name.
     *
     * @param string $where
     *
     * @return string
     */
    public function getWhereValue($where)
    {
        $string = mb_substr($where, mb_strpos($where, ':') + 1);

        return mb_substr($string, mb_strpos($string, '=') + 1);
    }

    /**
     * Determine whether the given data is valid or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function validate($attribute, $value, $parameters, $validator)
    {
        $this->setTablename($parameters);

        $this->setColumns($parameters);

        $this->setConnection($parameters);

        $this->setIgnoredValue($parameters);

        $this->setIgnoredColumnName($parameters);

        $this->setWheres($parameters);

        $connection = DB::connection($this->getConnection())
                            ->table($this->getTablename())
                            ->where($attribute, $value);

        $request = request();

        foreach ($this->getColumns() as $column) {
            $connection->where($this->getTableColumnName($column), $request->get($column));
        }

        foreach ($this->getWheres() as $where) {
            $connection->where($this->getWhereColumnName($where), $this->getWhereValue($where));
        }

        if ($this->hasIgnoredValue()) {
            $connection->where($this->getIgnoredColumnName(), '!=', $this->getIgnoredValue());
        }

        return (! $connection->exists());
    }
}
