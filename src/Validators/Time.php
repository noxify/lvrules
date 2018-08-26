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
 * Handle various time validation methods.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */
class Time
{
    /**
     * Determine whether the given time is a valid slug or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function hhmm12HrOptionalZerosNoMeridiems($attribute, $value, $parameters, $validator)
    {
        return preg_match('/^(0?[1-9]|1[0-2]):[0-5][0-9]$/u', $value);
    }

    /**
     * Determine whether the given time is a valid slug or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function hhmm12HrOptionalZerosMandatoryMeridiems($attribute, $value, $parameters, $validator)
    {
        return preg_match('/^(0?[1-9]|1[0-2]):[0-5][0-9]\s?[AaPp][Mm]$/u', $value);
    }

    /**
     * Determine whether the given time is a valid slug or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function hhmm12HrOptionalZerosOptionalMeridiems($attribute, $value, $parameters, $validator)
    {
        return preg_match('/^(0?[1-9]|1[0-2]):[0-5][0-9](\s?[AaPp][Mm])?$/u', $value);
    }
}
