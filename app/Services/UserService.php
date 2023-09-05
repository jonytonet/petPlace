<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService extends BaseService
{
    public function __construct(protected UserRepository $userRepository)
    {
        parent::__construct('UserRepository');
    }

    public function getCustomers(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->userRepository->getCustomers($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
