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
 * Handle test purposes, mainly always returning true or false.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */
class Test
{
    /**
     * Always return true.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function pass($attribute, $value, $parameters, $validator)
    {
        return true;
    }

    /**
     * Always return true.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function passes($attribute, $value, $parameters, $validator)
    {
        return $this->pass($attribute, $value, $parameters, $validator);
    }

    /**
     * Always return true.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function valid($attribute, $value, $parameters, $validator)
    {
        return $this->pass($attribute, $value, $parameters, $validator);
    }

    /**
     * Always return true.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function fail($attribute, $value, $parameters, $validator)
    {
        return false;
    }

    /**
     * Always return true.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function fails($attribute, $value, $parameters, $validator)
    {
        return $this->fail($attribute, $value, $parameters, $validator);
    }

    /**
     * Always return true.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function invalid($attribute, $value, $parameters, $validator)
    {
        return $this->fail($attribute, $value, $parameters, $validator);
    }
}
