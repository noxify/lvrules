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

use Illuminate\Support\Facades\Validator;
use Moharrum\LVRules\Exceptions\InvalidArgumentException;

/**
 * Handle various numbers validation methods.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */
class Numbers
{
    /**
     * Determine whether the given number is odd or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     * @todo  Check if the given value is numeric.
     *
     * @return bool
     */
    public function odd($attribute, $value, $parameters, $validator)
    {
        $number = (int)$value;

        if ($number % 2 !== 0) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the given number is even or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function even($attribute, $value, $parameters, $validator)
    {
        $number = (int)$value;

        if ($number % 2 === 0) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the given number is finite or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function finite($attribute, $value, $parameters, $validator)
    {
        if (! is_numeric($value)) {
            return false;
        }

        if (! is_finite($value)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the given number is infinite or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function infinite($attribute, $value, $parameters, $validator)
    {
        if (! is_numeric($value)) {
            return false;
        }

        if (! is_infinite($value)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the given number has
     * the specified number of decimals or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function decimals($attribute, $value, $parameters, $validator)
    {
        if (! isset($parameters[0])) {
            throw new InvalidArgumentException('Decimals Validation Rule: invalid syntax, missing decimal point places.');
        }

        $numberOfDecimalPointPlaces = (int)$parameters[0];

        if (0 === $numberOfDecimalPointPlaces) {
            throw new InvalidArgumentException('Decimals Validation Rule: 0 is not acceptable.');
        }

        return preg_match('/^[+-]?\p{Nd}+(.|,)\p{Nd}{1,' . $numberOfDecimalPointPlaces . '}$/u', $value);
    }
}
