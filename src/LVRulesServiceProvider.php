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

namespace Moharrum\LVRules;

use Moharrum\LVRules\Validators\Slug;
use Illuminate\Support\ServiceProvider;
use Moharrum\LVRules\Validators\Strings;
use Moharrum\LVRules\Validators\UniqueWith;
use Moharrum\LVRules\Exceptions\InvalidArgumentException;

/**
 * Moharrum Laravel rules package service provider.
 *
 * @category Validation
 * @package  Moharrum\LVRules
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/lvrules
 */
class LVRulesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'lvrules');

        $this->publishes(
            [
                __DIR__ . '/lang' => resource_path('lang/vendor/lvrules'),
            ],
            'lvrules'
        );

        $this->bootAlphaNumSpace();

        $this->bootAlphaSpace();

        $this->bootDecimals();

        $this->bootEven();

        $this->bootFail();

        $this->bootFails();

        $this->bootInvalid();

        $this->bootFinite();

        $this->bootInfinite();

        $this->bootLowercase();

        $this->bootMaxWord();

        $this->bootMinWord();

        $this->bootOdd();

        $this->bootPass();

        $this->bootPasses();

        $this->bootValid();

        $this->bootSlug();

        $this->bootTime();

        $this->bootTld();

        $this->bootUniqueWith();

        $this->bootUppercase();

        $this->bootUppercase();

        $this->bootUsername();

        // Still not developed
        $this->bootColor();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register alpha num space validator.
     *
     * @return void
     */
    public function bootAlphaNumSpace()
    {
        $this->app->validator->extend('alpha_num_space', '\Moharrum\LVRules\Validators\Strings@alphaNumSpace');

        $this->app->validator->replacer(
            'alpha_num_space',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, trans('lvrules::validation.alpha_num_space'));
            }
        );
    }

    /**
     * Register alpha space validator.
     *
     * @return void
     */
    public function bootAlphaSpace()
    {
        $this->app->validator->extend('alpha_space', '\Moharrum\LVRules\Validators\Strings@alphaSpace');

        $this->app->validator->replacer(
            'alpha_space',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, trans('lvrules::validation.alpha_space'));
            }
        );
    }

    /**
     * Register alpha dash validator.
     *
     * @return void
     */
    public function bootAlphaDash()
    {
        $this->app->validator->extend('alpha_dash', '\Moharrum\LVRules\Validators\Strings@alphaDash');

        $this->app->validator->replacer(
            'alpha_dash',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, trans('lvrules::validation.alpha_dash'));
            }
        );
    }

    /**
     * Register decimals validator.
     *
     * @return void
     */
    public function bootDecimals()
    {
        $this->app->validator->extend('decimals', '\Moharrum\LVRules\Validators\Numbers@decimals');

        $this->app->validator->replacer(
            'decimals',
            function ($message, $attribute, $rule, $parameters) {
                if (! isset($parameters[0])) {
                    throw new InvalidArgumentException('Invalid syntax, missing decimals places.');
                }

                $numberOfDecimalPointPlaces = (int)$parameters[0];

                return str_replace(
                    [
                        ':attribute',
                        ':num_of_decimal_point_places',
                    ],
                    [
                        $attribute,
                        $numberOfDecimalPointPlaces
                    ],
                    trans('lvrules::validation.decimals')
                );
            }
        );
    }

    /**
     * Register even validator.
     *
     * @return void
     */
    public function bootEven()
    {
        $this->app->validator->extend('even', '\Moharrum\LVRules\Validators\Numbers@even');

        $this->app->validator->replacer(
            'even',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(
                    ':attribute',
                    $attribute,
                    trans('lvrules::validation.even')
                );
            }
        );
    }

    /**
     * Register always return false validator.
     *
     * @return void
     */
    public function bootFail()
    {
        $this->app->validator->extend('fail', '\Moharrum\LVRules\Validators\Test@fail');

        $this->app->validator->replacer(
            'fail',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('lvrules::validation.fail');

                return str_replace(':attribute', $attribute, $lang);
            }
        );
    }

    /**
     * Register always return false validator.
     *
     * @return void
     */
    public function bootFails()
    {
        $this->app->validator->extend('fails', '\Moharrum\LVRules\Validators\Test@fails');

        $this->app->validator->replacer(
            'fails',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('lvrules::validation.fail');

                return str_replace(':attribute', $attribute, $lang);
            }
        );
    }

    /**
     * Register always return false validator.
     *
     * @return void
     */
    public function bootInvalid()
    {
        $this->app->validator->extend('invalid', '\Moharrum\LVRules\Validators\Test@invalid');

        $this->app->validator->replacer(
            'invalid',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('lvrules::validation.fail');

                return str_replace(':attribute', $attribute, $lang);
            }
        );
    }

    /**
     * Register finite validator.
     *
     * @return void
     */
    public function bootFinite()
    {
        $this->app->validator->extend('finite', '\Moharrum\LVRules\Validators\Numbers@finite');

        $this->app->validator->replacer(
            'finite',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(
                    ':attribute',
                    $attribute,
                    trans('lvrules::validation.finite')
                );
            }
        );
    }

    /**
     * Register infinite validator.
     *
     * @return void
     */
    public function bootInfinite()
    {
        $this->app->validator->extend('infinite', '\Moharrum\LVRules\Validators\Numbers@infinite');

        $this->app->validator->replacer(
            'infinite',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(
                    ':attribute',
                    $attribute,
                    trans('lvrules::validation.infinite')
                );
            }
        );
    }

    /**
     * Register lowercase validator.
     *
     * @return void
     */
    public function bootLowercase()
    {
        $this->app->validator->extend('lowercase', '\Moharrum\LVRules\Validators\Strings@lowercase');

        $this->app->validator->replacer(
            'lowercase',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('lvrules::validation.lowercase');

                return str_replace(':attribute', $attribute, $lang);
            }
        );
    }

    /**
     * Register maximum words validator.
     *
     * @return void
     */
    public function bootMaxWord()
    {
        $this->app->validator->extend('max_words', '\Moharrum\LVRules\Validators\Strings@maxWords');

        $this->app->validator->replacer(
            'max_words',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('lvrules::validation.max_words');
                $langWithLength = str_replace(':num_words', $parameters[0], $lang);

                return str_replace(':attribute', $attribute, $langWithLength);
            }
        );
    }

    /**
     * Register minimum words validator.
     *
     * @return void
     */
    public function bootMinWord()
    {
        $this->app->validator->extend('min_words', '\Moharrum\LVRules\Validators\Strings@minWords');

        $this->app->validator->replacer(
            'min_words',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('lvrules::validation.min_words');
                $langWithLength = str_replace(':num_words', $parameters[0], $lang);

                return str_replace(':attribute', $attribute, $langWithLength);
            }
        );
    }

    /**
     * Register odd validator.
     *
     * @return void
     */
    public function bootOdd()
    {
        $this->app->validator->extend('odd', '\Moharrum\LVRules\Validators\Numbers@odd');

        $this->app->validator->replacer(
            'odd',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(
                    ':attribute',
                    $attribute,
                    trans('lvrules::validation.odd')
                );
            }
        );
    }

    /**
     * Register always return true validator.
     *
     * @return void
     */
    public function bootPass()
    {
        $this->app->validator->extend('pass', '\Moharrum\LVRules\Validators\Test@pass');
    }

    /**
     * Register always return true validator.
     *
     * @return void
     */
    public function bootPasses()
    {
        $this->app->validator->extend('passes', '\Moharrum\LVRules\Validators\Test@passes');
    }

    /**
     * Register always return true validator.
     *
     * @return void
     */
    public function bootValid()
    {
        $this->app->validator->extend('valid', '\Moharrum\LVRules\Validators\Test@valid');
    }

    /**
     * Register slug validator.
     *
     * @return void
     */
    public function bootSlug()
    {
        $intl = false;

        $this->app->validator->extend(
            'slug',
            function ($attribute, $value, $parameters, $validator) use (&$intl) {
                $slug = new Slug;

                $check = $slug->validate($attribute, $value, $parameters, $validator);

                if (isset($parameters[0]) && ($parameters[0] === 'intl')) {
                    $intl = true;
                }

                return $check;
            }
        );

        $this->app->validator->replacer(
            'slug',
            function ($message, $attribute, $rule, $parameters) use (&$intl) {
                if ($intl) {
                    return str_replace(':attribute', $attribute, trans('lvrules::validation.slug_intl'));
                }

                return str_replace(':attribute', $attribute, trans('lvrules::validation.slug'));
            }
        );
    }

    /**
     * Register time validator.
     *
     * @return void
     */
    public function bootTime()
    {
        $this->app->validator->extend('time', '\Moharrum\LVRules\Validators\Time@validate');

        $this->app->validator->replacer(
            'time',
            function ($message, $attribute, $rule, $parameters) {
                $attrReplaced = str_replace(':attribute', $attribute, trans('lvrules::validation.time'));

                if (empty($parameters)) {
                    return str_replace(':format', 'HH:mm:ss', $attrReplaced);
                }

                if (in_array('military', $parameters)) {
                    if (in_array('no_colon', $parameters)) {
                        return str_replace(':format', 'HHmm', $attrReplaced);
                    }

                    if (in_array('optional_colon', $parameters)) {
                        return str_replace(':format', 'HH[:]mm', $attrReplaced);
                    }

                    if (in_array('mandatory_colon', $parameters)) {
                        return str_replace(':format', 'HH:mm', $attrReplaced);
                    }

                    return str_replace(':format', 'HH[:]mm', $attrReplaced);
                }

                if (in_array('24hr', $parameters)) {
                    if (in_array('optional_seconds', $parameters)) {
                        return str_replace(':format', 'HH:mm[:ss]', $attrReplaced);
                    }

                    return str_replace(':format', 'HH:mm:ss', $attrReplaced);
                }

                if (in_array('12hr', $parameters)) {
                    if (in_array('no_meridiems', $parameters)) {
                        if (in_array('no_seconds', $parameters)) {
                            return str_replace(':format', 'hh:mm', $attrReplaced);
                        }

                        if (in_array('optional_seconds', $parameters)) {
                            return str_replace(':format', 'hh:mm[:ss]', $attrReplaced);
                        }

                        if (in_array('mandatory_seconds', $parameters)) {
                            return str_replace(':format', 'hh:mm:ss', $attrReplaced);
                        }

                        return str_replace(':format', 'hh:mm:ss', $attrReplaced);
                    }

                    if (in_array('optional_meridiems', $parameters)) {
                        if (in_array('no_seconds', $parameters)) {
                            return str_replace(':format', 'hh:mm[ AM|PM]', $attrReplaced);
                        }

                        if (in_array('optional_seconds', $parameters)) {
                            return str_replace(':format', 'hh:mm[:ss][ AM|PM]', $attrReplaced);
                        }

                        if (in_array('mandatory_seconds', $parameters)) {
                            return str_replace(':format', 'hh:mm:ss[ AM|PM]', $attrReplaced);
                        }

                        return str_replace(':format', 'hh:mm:ss[ AM|PM]', $attrReplaced);
                    }

                    if (in_array('mandatory_meridiems', $parameters)) {
                        if (in_array('no_seconds', $parameters)) {
                            return str_replace(':format', 'hh:mm AM|PM', $attrReplaced);
                        }

                        if (in_array('optional_seconds', $parameters)) {
                            return str_replace(':format', 'hh:mm[:ss] AM|PM', $attrReplaced);
                        }

                        if (in_array('mandatory_seconds', $parameters)) {
                            return str_replace(':format', 'hh:mm:ss AM|PM', $attrReplaced);
                        }

                        return str_replace(':format', 'hh:mm:ss AM|PM', $attrReplaced);
                    }

                    return str_replace(':format', 'hh:mm:ss AM|PM', $attrReplaced);
                }
            }
        );
    }

    /**
     * Register tld validator.
     *
     * @return void
     */
    public function bootTld()
    {
        $this->app->validator->extend('tld', '\Moharrum\LVRules\Validators\Tlds@validate');

        $this->app->validator->replacer(
            'tld',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, trans('lvrules::validation.tld'));
            }
        );
    }

    /**
     * Register unique with validator.
     *
     * @return void
     */
    public function bootUniqueWith()
    {
        $columns = [];

        $this->app->validator->extend(
            'unique_with',
            function ($attribute, $value, $parameters, $validator) use (&$columns) {
                $uniqueWith = new UniqueWith;

                $check = $uniqueWith->validate($attribute, $value, $parameters, $validator);

                $columns = $uniqueWith->getColumns();

                return $check;
            }
        );

        $this->app->validator->replacer(
            'unique_with',
            function ($message, $attribute, $rule, $parameters) use (&$columns) {
                $columnsReplaced = str_replace(':columns', implode($columns, ', '), trans('lvrules::validation.unique_with'));
                return str_replace(':attribute', $attribute, $columnsReplaced);
            }
        );
    }

    /**
     * Register uppercase validator.
     *
     * @return void
     */
    public function bootUppercase()
    {
        $this->app->validator->extend('uppercase', '\Moharrum\LVRules\Validators\Strings@uppercase');

        $this->app->validator->replacer(
            'uppercase',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('lvrules::validation.uppercase');

                return str_replace(':attribute', $attribute, $lang);
            }
        );
    }

    /**
     * Register username validator.
     *
     * @return void
     */
    public function bootUsername()
    {
        $leadingLetters = false;

        $this->app->validator->extend(
            'username',
            function ($attribute, $value, $parameters, $validator) use (&$leadingLetters) {
                $strings = new Strings;

                $check = $strings->username($attribute, $value, $parameters, $validator);

                if (isset($parameters[0]) && ($parameters[0] === 'letters_do_lead')) {
                    $leadingLetters = true;
                }

                return $check;
            }
        );

        $this->app->validator->replacer(
            'username',
            function ($message, $attribute, $rule, $parameters) use (&$leadingLetters) {
                if ($leadingLetters) {
                    return str_replace(':attribute', $attribute, trans('lvrules::validation.username_with_leading_letters'));
                }

                return str_replace(':attribute', $attribute, trans('lvrules::validation.username'));
            }
        );
    }

    /**
     * Register color validator.
     *
     * @return void
     */
    public function bootColor()
    {
        $this->app->validator->extend('color', '\Moharrum\LVRules\Validators\Color@validate');

        $this->app->validator->replacer(
            'color',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, trans('lvrules::validation.color'));
            }
        );
    }
}
