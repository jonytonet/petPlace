<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;


class UserService extends BaseService
{


    public function __construct(protected UserRepository $userRepository)
    {
        parent::__construct('UserRepository');
    }

    public function getCustomers():Collection
    {
        return $this->userRepository->getCustomers();
    }

}
