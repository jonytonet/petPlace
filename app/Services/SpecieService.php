<?php

namespace App\Services;


use App\Repositories\SpecieRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class SpecieService extends BaseService
{
    public function __construct(protected SpecieRepository $specieRepository)
    {
        parent::__construct('SpecieRepository');
    }

    public function getSpeciesToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->specieRepository->getSpeciesToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
