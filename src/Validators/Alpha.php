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

/**
 * Handle various alpha validation methods.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */
class Alpha
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
    public function alphaNumSpace($attribute, $value, $parameters, $validator)
    {
        return preg_match('/^[\p{L}\s\p{N}.-]+$/u', $value);
    }
}
