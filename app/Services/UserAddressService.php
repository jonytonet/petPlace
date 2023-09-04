<?php

namespace App\Services;

use App\Repositories\UserAddressRepository;


class UserAddressService extends BaseService
{

    public function __construct(protected UserAddressRepository $userAddressRepository)
    {
        parent::__construct('UserAddressRepository');
    }



}
