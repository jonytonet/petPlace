<?php

namespace App\Repositories;

use App\Models\UserAddress;

class UserAddressRepository extends BaseRepository
{
    public function __construct(protected UserAddress $model)
    {
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return UserAddress::class;
    }
}
