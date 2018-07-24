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
 * Handle various word validation methods.
 *
 * @category Validation
 * @package  Moharrum\Utilities
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/utilities
 */
class Words
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
     * Determine whether the given string is valid or not.
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
