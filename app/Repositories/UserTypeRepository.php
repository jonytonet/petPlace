<?php

namespace App\Repositories;

use App\Models\UserType;

class UserTypeRepository extends BaseRepository
{
    protected $model;

    public function __construct(UserType $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return UserType::class;
    }
}
