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

namespace Moharrum\Utilities;

use Illuminate\Support\ServiceProvider;
use Moharrum\Utilities\Exceptions\InvalidArgumentException;

/**
 * Moharrum utilities package service provider.
 *
 * @category Validation
 * @package  Moharrum\Utilities
 * @author   Khalid Moharrum <khalid.moharram@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT license
 * @link     https://github.com/moharrum/utilities
 */
class UtilitiesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'meme-utils');

        $this->publishes(
            [
                __DIR__ . '/lang' => resource_path('lang/vendor/meme-utils'),
            ],
            'moharrum-utilities'
        );

        $this->bootPass();

        $this->bootPasses();

        $this->bootValid();

        $this->bootFail();

        $this->bootFails();

        $this->bootInvalid();

        $this->bootLowercase();

        $this->bootUppercase();

        $this->bootMinWord();

        $this->bootMaxWord();

        $this->bootAlphaSpace();

        $this->bootAlphaNumSpace();

        $this->bootUniqueWith();

        $this->bootDecimals();

        $this->bootTld();
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
     * Register always return true validator.
     *
     * @return void
     */
    public function bootPass()
    {
        $this->app->validator->extend('pass', '\Moharrum\Utilities\Validators\Test@pass');
    }

    /**
     * Register always return true validator.
     *
     * @return void
     */
    public function bootPasses()
    {
        $this->app->validator->extend('passes', '\Moharrum\Utilities\Validators\Test@passes');
    }

    /**
     * Register always return true validator.
     *
     * @return void
     */
    public function bootValid()
    {
        $this->app->validator->extend('valid', '\Moharrum\Utilities\Validators\Test@valid');
    }

    /**
     * Register always return false validator.
     *
     * @return void
     */
    public function bootFail()
    {
        $this->app->validator->extend('fail', '\Moharrum\Utilities\Validators\Test@fail');

        $this->app->validator->replacer(
            'fail', function ($message, $attribute, $rule, $parameters) {
                $lang = trans('meme-utils::validation.fail');

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
        $this->app->validator->extend('fails', '\Moharrum\Utilities\Validators\Test@fails');

        $this->app->validator->replacer(
            'fails',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('meme-utils::validation.fails');

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
        $this->app->validator->extend('invalid', '\Moharrum\Utilities\Validators\Test@invalid');

        $this->app->validator->replacer(
            'invalid',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('meme-utils::validation.invalid');

                return str_replace(':attribute', $attribute, $lang);
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
        $this->app->validator->extend('lowercase', '\Moharrum\Utilities\Validators\Strings@lowercase');

        $this->app->validator->replacer(
            'lowercase', function ($message, $attribute, $rule, $parameters) {
                $lang = trans('meme-utils::validation.lowercase');

                return str_replace(':attribute', $attribute, $lang);
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
        $this->app->validator->extend('uppercase', '\Moharrum\Utilities\Validators\Strings@uppercase');

        $this->app->validator->replacer(
            'uppercase', function ($message, $attribute, $rule, $parameters) {
                $lang = trans('meme-utils::validation.uppercase');

                return str_replace(':attribute', $attribute, $lang);
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
        $this->app->validator->extend('min_words', '\Moharrum\Utilities\Validators\Strings@minWords');

        $this->app->validator->replacer(
            'min_words', function ($message, $attribute, $rule, $parameters) {
                $lang = trans('meme-utils::validation.min_words');
                $langWithLength = str_replace(':num_words', $parameters[0], $lang);

                return str_replace(':attribute', $attribute, $langWithLength);
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
        $this->app->validator->extend('max_words', '\Moharrum\Utilities\Validators\Strings@maxWords');

        $this->app->validator->replacer(
            'max_words',
            function ($message, $attribute, $rule, $parameters) {
                $lang = trans('meme-utils::validation.max_words');
                $langWithLength = str_replace(':num_words', $parameters[0], $lang);

                return str_replace(':attribute', $attribute, $langWithLength);
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
        $this->app->validator->extend('alpha_space', '\Moharrum\Utilities\Validators\Alpha@alphaSpace');

        $this->app->validator->replacer(
            'alpha_space', function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, trans('meme-utils::validation.alpha_space'));
            }
        );
    }

    /**
     * Register alpha num space validator.
     *
     * @return void
     */
    public function bootAlphaNumSpace()
    {
        $this->app->validator->extend('alpha_num_space', '\Moharrum\Utilities\Validators\Alpha@alphaNumSpace');

        $this->app->validator->replacer(
            'alpha_num_space',
            function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, trans('meme-utils::validation.alpha_num_space'));
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
        $this->app->validator->extend('unique_with', '\Moharrum\Utilities\Validators\UniqueWith@validate');

        $this->app->validator->replacer(
            'unique_with', function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, trans('meme-utils::validation.unique_with'));
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
        $this->app->validator->extend('decimals', '\Moharrum\Utilities\Validators\Number@decimals');

        $this->app->validator->replacer(
            'decimals', function ($message, $attribute, $rule, $parameters) {
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
                    trans('meme-utils::validation.decimals')
                );
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
        $this->app->validator->extend('tld', '\Moharrum\Utilities\Validators\Tlds@validate');

        $this->app->validator->replacer(
            'tld', function ($message, $attribute, $rule, $parameters) {
                return str_replace(':attribute', $attribute, trans('meme-utils::validation.tld'));
            }
        );
    }
}
