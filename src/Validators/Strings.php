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
 * Handle various string validation methods.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */
class Strings
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
    public function alphaNumSpace($attribute, $value, $parameters, $validator)
    {
        return preg_match('/^[\p{L}\s\p{N}.-]+$/u', $value);
    }

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
    public function alphaSpace($attribute, $value, $parameters, $validator)
    {
        return preg_match('/^[\p{L}\s]+$/u', $value);
    }

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
    public function alphaDash($attribute, $value, $parameters, $validator)
    {
        return preg_match('/^[\p{L}-]+$/u', $value);
    }

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
     * Determine whether the given string a valid username or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function username($attribute, $value, $parameters, $validator)
    {
        if (isset($parameters[0]) && ($parameters[0] === 'letters_do_lead')) {
            return preg_match('/^[\p{L}]([._-]?[\p{L}\p{Nd}]?+)*$/u', $value);
        }

        if (empty($parameters)) {
            return preg_match('/^[\p{L}\p{Nd}._-]+$/u', $value);
        }

        throw new InvalidArgumentException('Username Validation Rule: unknown option.');
    }
}
