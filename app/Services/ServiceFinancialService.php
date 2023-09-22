<?php

namespace App\Services;

use App\Repositories\ServiceFinancialRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceFinancialService extends BaseService
{
    public function __construct(protected ServiceFinancialRepository $serviceFinancialRepository)
    {
        parent::__construct('ServiceFinancialRepository');
    }

    public function getServiceFinancialsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->serviceFinancialRepository->getServiceFinancialsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
