<?php

namespace App\Repositories\Api;

use Illuminate\Support\Facades\Http;

class GetZipCodeRepository
{
    public function __construct()
    {

    }

    public function getZipCode($zipcode)
    {
        $response = Http::withOptions(['verify' => false])->get("https://viacep.com.br/ws/$zipcode/json/");
        if ($response->status() != 200) {
            return [
                'status' => 'error',
                'data' => null,
                'msg' => $response->json(),
            ];
        }
        $result = json_decode($response->body());

        return [
            'status' => 'success',
            'data' => $result,
            'msg' => 'Reculperado com sucesso',
        ];
    }
}
