<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'news_api' => [
        'host' => env('NEWS_API_HOST'),
        'api_key' => env('NEWS_API_KEY')
    ],
    'random_user_api' => [
        'host' => env('RANDOM_USER_API_HOST')
    ]
];
