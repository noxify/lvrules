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
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function twelveHrNoSecondsNoMeridiems($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(0[1-9]|1[0-2]):[0-5][0-9]$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function twelveHrMandatorySecondsNoMeridiems($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(0[1-9]|1[0-2]):[0-5][0-9]:[0-5][0-9]$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function twelveHrOptionalSecondsNoMeridiems($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(0[1-9]|1[0-2]):[0-5][0-9](:[0-5][0-9])?$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function twelveHrNoSecondsMandatoryMeridiems($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(0[1-9]|1[0-2]):[0-5][0-9]\s?[AaPp][Mm]$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function twelveHrMandatorySecondsMandatoryMeridiems($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(0[1-9]|1[0-2]):[0-5][0-9]:[0-5][0-9]\s?[AaPp][Mm]$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function twelveHrOptionalSecondsMandatoryMeridiems($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(0[1-9]|1[0-2]):[0-5][0-9](:[0-5][0-9])?\s?[AaPp][Mm]$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function twelveHrNoSecondsOptionalMeridiems($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(0[1-9]|1[0-2]):[0-5][0-9](\s?[AaPp][Mm])?$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function twelveHrMandatorySecondsOptionalMeridiems($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(0[1-9]|1[0-2]):[0-5][0-9]:[0-5][0-9](\s?[AaPp][Mm])?$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function twelveHrOptionalSecondsOptionalMeridiems($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(0[1-9]|1[0-2]):[0-5][0-9](:[0-5][0-9])?(\s?[AaPp][Mm])?$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function international($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(([0-1][0-9])|([2][0-3])):[0-5][0-9]:[0-5][0-9]$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function internationalOptionalSeconds($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(([0-1][0-9])|([2][0-3])):([0-5][0-9])(:([0-5][0-9]))?$/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function militaryNoColon($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(((([0-1][0-9])|(2[0-3]))[0-5][0-9])|(2400))/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function militaryMandatoryColon($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(((([0-1][0-9])|(2[0-3])):[0-5][0-9])|(24:00))/u', $value);
    }

    /**
     * Determine whether the given time is a valid time or not.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    public function militaryOptionalColon($attribute, $value, $parameters, $validator)
    {
        return (bool)preg_match('/^(((([0-1][0-9])|(2[0-3])):?[0-5][0-9])|(24:?00))/u', $value);
    }

    /**
     * Determine whether the given string is a valid time or not.
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
        if (empty($parameters)) {
            return $this->international($attribute, $value, $parameters, $validator);
        }

        if (in_array('military', $parameters)) {
            if (in_array('no_colon', $parameters)) {
                return $this->militaryNoColon($attribute, $value, $parameters, $validator);
            }

            if (in_array('optional_colon', $parameters)) {
                return $this->militaryOptionalColon($attribute, $value, $parameters, $validator);
            }

            if (in_array('mandatory_colon', $parameters)) {
                return $this->militaryMandatoryColon($attribute, $value, $parameters, $validator);
            }

            return $this->militaryOptionalColon($attribute, $value, $parameters, $validator);
        }

        if (in_array('24hr', $parameters)) {
            if (in_array('optional_seconds', $parameters)) {
                return $this->internationalOptionalSeconds($attribute, $value, $parameters, $validator);
            }

            return $this->international($attribute, $value, $parameters, $validator);
        }

        if (in_array('12hr', $parameters)) {
            if (in_array('no_meridiems', $parameters)) {
                if (in_array('no_seconds', $parameters)) {
                    return $this->twelveHrNoSecondsNoMeridiems($attribute, $value, $parameters, $validator);
                }

                if (in_array('optional_seconds', $parameters)) {
                    return $this->twelveHrOptionalSecondsNoMeridiems($attribute, $value, $parameters, $validator);
                }

                if (in_array('mandatory_seconds', $parameters)) {
                    return $this->twelveHrMandatorySecondsNoMeridiems($attribute, $value, $parameters, $validator);
                }

                return $this->twelveHrMandatorySecondsNoMeridiems($attribute, $value, $parameters, $validator);
            }

            if (in_array('optional_meridiems', $parameters)) {
                if (in_array('no_seconds', $parameters)) {
                    return $this->twelveHrNoSecondsOptionalMeridiems($attribute, $value, $parameters, $validator);
                }

                if (in_array('optional_seconds', $parameters)) {
                    return $this->twelveHrOptionalSecondsOptionalMeridiems($attribute, $value, $parameters, $validator);
                }

                if (in_array('mandatory_seconds', $parameters)) {
                    return $this->twelveHrMandatorySecondsOptionalMeridiems($attribute, $value, $parameters, $validator);
                }

                return $this->twelveHrMandatorySecondsOptionalMeridiems($attribute, $value, $parameters, $validator);
            }

            if (in_array('mandatory_meridiems', $parameters)) {
                if (in_array('no_seconds', $parameters)) {
                    return $this->twelveHrNoSecondsMandatoryMeridiems($attribute, $value, $parameters, $validator);
                }

                if (in_array('optional_seconds', $parameters)) {
                    return $this->twelveHrOptionalSecondsMandatoryMeridiems($attribute, $value, $parameters, $validator);
                }

                if (in_array('mandatory_seconds', $parameters)) {
                    return $this->twelveHrMandatorySecondsMandatoryMeridiems($attribute, $value, $parameters, $validator);
                }

                return $this->twelveHrMandatorySecondsMandatoryMeridiems($attribute, $value, $parameters, $validator);
            }

            return $this->twelveHrMandatorySecondsMandatoryMeridiems($attribute, $value, $parameters, $validator);
        }

        throw new InvalidArgumentException('Time Validation Rule: unknown option.');
    }
}
