<?php

/**
 * Package author: Khalid Moharrum.
 *
 * PHP version 5, 7.
 *
 * @category Validation
 * @package  Moharrum\Utilities
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/utilities
 */

namespace Moharrum\Utilities\Validators;

use Illuminate\Support\Facades\Validator;
use Moharrum\Utilities\Exceptions\InvalidArgumentException;

/**
 * Handle various number validation methods.
 *
 * @category Validation
 * @package  Moharrum\Utilities
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/utilities
 */
class Number
{
    /**
     * Determine whether the given string is valid or not.
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
            throw new InvalidArgumentException('Invalid syntax, missing decimal point places.');
        }

        $numberOfDecimalPointPlaces = (int)$parameters[0];

        return preg_match('/^[+-]?\p{Nd}+(.|,)\p{Nd}{1,' . $numberOfDecimalPointPlaces . '}$|^[+-]?\p{Nd}+$/u', $value);
    }
}
