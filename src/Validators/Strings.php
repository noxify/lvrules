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

/**
 * Handle various string validation methods.
 *
 * @category Validation
 * @package  Moharrum\Utilities
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/utilities
 */
class Strings
{
    /**
     * Determine whether the given string is in lowercase format or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function lowercase($attribute, $value, $parameters, $validator)
    {
        return $value === mb_strtolower($value, mb_detect_encoding($value));
    }

    /**
     * Determine whether the given string is in uppercase format or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function uppercase($attribute, $value, $parameters, $validator)
    {
        return $value === mb_strtoupper($value, mb_detect_encoding($value));
    }

    /**
     * Determine whether the given string contains at least
     * a given number of words or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function minWords($attribute, $value, $parameters, $validator)
    {
        $minWords = (int)$parameters[0];

        $exploded = explode(' ', $value);

        $validParts = [];

        foreach ($exploded as $part) {
            if (empty($part)) {
                continue;
            }

            $validParts[] = $part;
        }

        if (count($validParts) >= $minWords) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the given string contains more than
     * a given number of words or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function maxWords($attribute, $value, $parameters, $validator)
    {
        $maxWords = (int)$parameters[0];

        $exploded = explode(' ', $value);

        $validParts = [];

        foreach ($exploded as $part) {
            if (empty($part)) {
                continue;
            }

            $validParts[] = $part;
        }

        if (count($validParts) <= $maxWords) {
            return true;
        }

        return false;
    }
}
