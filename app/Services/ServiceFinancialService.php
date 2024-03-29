<?php

namespace App\Services;

use App\Models\ServiceFinancial;
use App\Repositories\ServiceFinancialRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceFinancialService extends BaseService
{
    public function __construct(protected ServiceFinancialRepository $serviceFinancialRepository)
    {
        parent::__construct('ServiceFinancialRepository');
    }

    public function getServiceFinancialsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit, ?array $customerFilters): LengthAwarePaginator
    {
        return $this->serviceFinancialRepository->getServiceFinancialsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit, $customerFilters);
    }

    public function destroyByServiceReference(int $serviceReferenceId): bool
    {
        return $this->serviceFinancialRepository->destroyByServiceReference($serviceReferenceId);
    }

    public function getServiceFinancialsByUser(int $userId, ?string $reference, ?string $orderBy, ?string $orderDirection): LengthAwarePaginator
    {
        return $this->serviceFinancialRepository->getServiceFinancialsByUser($userId, $reference, $orderBy, $orderDirection);
    }

    public function getServiceFinancialData(): ?ServiceFinancial
    {
        return $this->serviceFinancialRepository->getServiceFinancialData();
    }
}
