<?php

namespace App\Services;

use App\Repositories\PetRepository;
use Illuminate\Pagination\LengthAwarePaginator;


class PetService extends BaseService
{
    public function __construct(protected PetRepository $petRepository)
    {
        parent::__construct('PetRepository');
    }

    public function getPetsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->petRepository->getPetsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
