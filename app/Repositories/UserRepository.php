<?php


namespace App\Repositories;


use Illuminate\Support\Facades\Http;

class UserRepository
{
    function generate($qtyUsers) {
        $parameters = ['results' => $qtyUsers];
        $url = config('services.random_user_api.host');
        $response = Http::get($url, $parameters);

        return $response->json();
    }
}

