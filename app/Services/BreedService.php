<?php

namespace App\Services;

use App\Repositories\BreedRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class BreedService extends BaseService
{
    public function __construct(protected BreedRepository $breedRepository)
    {
        parent::__construct('BreedRepository');
    }

    public function getBreedsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->breedRepository->getBreedsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
