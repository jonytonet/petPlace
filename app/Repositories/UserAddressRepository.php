<?php

namespace App\Repositories;

use App\Models\UserAddress;

class UserAddressRepository extends BaseRepository
{
    protected $model;

    public function __construct(UserAddress $model)
    {
        $this->model = $model;
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
