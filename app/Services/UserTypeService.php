<?php

namespace App\Services;

use App\Repositories\UserTypeRepository;

class UserTypeService extends BaseService
{
    public function __construct(protected UserTypeRepository $userTypeRepository)
    {
        parent::__construct('UserTypeRepository');
    }
}
