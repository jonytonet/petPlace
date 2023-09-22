<?php

namespace App\Services;

use App\Repositories\VaccineRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class VaccineService extends BaseService
{
    public function __construct(protected VaccineRepository $vaccineRepository)
    {
        parent::__construct('VaccineRepository');
    }

    public function getVaccinesToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->vaccineRepository->getVaccinesToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
