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
 * Handle hex and rgba color validations.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */
class Color
{
    /**
     * Validate color.
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
        $validation = null;

        if (! count($parameters)) {
            $validation = 'hex';

            return $this->hex($attribute, $value, $parameters, $validator);
        }

        $validation = $parameters[0];

        return $this->{$validation}($attribute, $value, $parameters, $validator);
    }

    /**
     * Validate hex color.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    protected function hex($attribute, $value, $parameters, $validator)
    {
        if (mb_strpos($value, '#') === 0) {
            $value = mb_substr($value, 1);
        }

        if ((mb_strlen($value) !== 3) && (mb_strlen($value) !== 6)) {
            return false;
        }

        return ctype_xdigit($value);
    }

    /**
     * Validate rgb color.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    protected function rgb($attribute, $value, $parameters, $validator)
    {
        // https://gist.github.com/olmokramer/82ccce673f86db7cda5e
        // https://developer.mozilla.org/en-US/docs/Web/CSS/color_value
        // (#([\da-f]{3}){1,2}|(rgb|hsl)a\((\d{1,3}%?,\s?){3}(1|0?\.\d+)\)|(rgb|hsl)\(\d{1,3}%?(,\s?\d{1,3}%?){2}\))
        $startPos = mb_strpos($value, '(');
        $endPos = mb_strpos($value, ')');

        $length = $endPos - $startPos;

        $values = mb_substr($value, $startPos + 1, $length - 1);

        $values = explode(',', $values);

        $values = array_map(
            function ($component) {
                return trim($component);
            },
            $values
        );

        foreach ($values as $component) {
            if (mb_strpos($component, '%')) {
                $val = substr($component, 0, mb_strpos($component, '%'));

                if (($val < 0) || ($val > 100)) {
                    return false;
                }
            }

            if (! mb_strpos($component, '%')) {
                $val = (int)$component;

                if (($val < 0) || ($val > 255)) {
                    return false;
                }
            }
        }

        return preg_match('/rgb\(\s*?\p{Nd}{1,3}(.\p{Nd}*)?%(\s*?,\s*?\p{Nd}{1,3}(.\p{Nd}*)?%\s*?){2}\)|rgb\(\s*?\p{Nd}{1,3}(.\p{Nd}*)?(\s*?,\s*?\p{Nd}{1,3}(.\p{Nd}*)?\s*?){2}\)/u', $value);
    }

    /**
     * Validate hsl color.
     *
     * @param $attribute
     * @param $value
     * @param $parameters
     * @param $validator
     *
     * @return bool
     */
    protected function hsl($attribute, $value, $parameters, $validator)
    {
        $startPos = mb_strpos($value, '(');
        $endPos = mb_strpos($value, ')');

        $length = $endPos - $startPos;

        $values = mb_substr($value, $startPos + 1, $length - 1);

        $values = explode(',', $values);

        $values = array_map(
            function ($component) {
                return trim($component);
            },
            $values
        );

        foreach ($values as $component) {
            if (mb_strpos($component, '%')) {
                $val = substr($component, 0, mb_strpos($component, '%'));

                if (($val < 0) || ($val > 100)) {
                    return false;
                }
            }

            if (! mb_strpos($component, '%')) {
                $val = (int)$component;

                if (($val < 0) || ($val > 255)) {
                    return false;
                }
            }
        }

        return preg_match('/hsl\(\s*?\p{Nd}{1,3}(.\p{Nd}*)?%(\s*?,\s*?\p{Nd}{1,3}(.\p{Nd}*)?%\s*?){2}\)|hsl\(\s*?\p{Nd}{1,3}(.\p{Nd}*)?(\s*?,\s*?\p{Nd}{1,3}(.\p{Nd}*)?\s*?){2}\)/u', $value);
    }

    // rgba\((\s*?\p{Nd}{1,3}(.\p{Nd}*)?\s*?,\s*?){3}(1\s*?|0?\.\p{Nd}+\s*?)\)|rgba\((\s*?\p{Nd}{1,3}(.\p{Nd}*)?%\s*?,\s*?){3}(1\s*?|0?\.\p{Nd}+\s*?)\)
}
