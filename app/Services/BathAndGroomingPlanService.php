<?php

namespace App\Services;

use App\Repositories\BathAndGroomingPlanRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class BathAndGroomingPlanService extends BaseService
{
    public function __construct(protected BathAndGroomingPlanRepository $bathAndGroomingPlanRepository)
    {
        parent::__construct('BathAndGroomingPlanRepository');
    }

    public function getBathAndGroomingPlansToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->bathAndGroomingPlanRepository->getBathAndGroomingPlansToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
