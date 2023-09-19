<?php

namespace App\Services;

use App\Repositories\DaycarePlanRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DaycarePlanService extends BaseService
{
    public function __construct(protected DaycarePlanRepository $daycarePlanRepository)
    {
        parent::__construct('DaycarePlanRepository');
    }

    public function getDaycarePlansToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->daycarePlanRepository->getDaycarePlansToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
