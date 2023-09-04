<?php

namespace App\Services;

use App\Repositories\Api\GetZipCodeRepository;
use Illuminate\Support\Fluent;

class CustomerService
{
    public function __construct()
    {

    }

    public function getZipCode(string $zipCode): ?Fluent
    {
        $zipCode = preg_replace('/[^0-9]/', '', $zipCode);
        $response = app()->make(GetZipCodeRepository::class)->getZipCode($zipCode);
        if ($response['status'] == 'success') {
            return new Fluent($response['data']);
        }

        return null;
    }
}
