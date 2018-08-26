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
 * Handle various slug validation methods.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */
class Slug
{
    /**
     * Determine whether the given string is a valid slug or not.
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
        if (isset($parameters[0]) && ($parameters[0] === 'intl')) {
            return preg_match('/^[\p{Ll}\p{Nd}\p{Lo}-]+$/u', $value);
        }

        if (empty($parameters)) {
            return preg_match('/^[a-z0-9-]+$/u', $value);
        }

        throw new InvalidArgumentException('Slug Validation Rule: unknown slug type.');
    }
}
