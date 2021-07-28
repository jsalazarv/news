<?php

namespace App\Repositories;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsRepository
{
    function search(Request $request) {
        $url = config('services.news_api.host').'/top-headlines';
        $apiKey = config('services.news_api.api_key');
        $defaultQueryParams = ['country' => 'MX'];
        $userQueryParams = $request->all();

        $parameters = array_merge($defaultQueryParams, $userQueryParams,['apiKey' => $apiKey]);

        $response = Http::get($url, $parameters);

        return $response->json();
    }
}
