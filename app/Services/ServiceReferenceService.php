<?php

namespace App\Services;

use App\Repositories\ServiceReferenceRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceReferenceService extends BaseService
{
    public function __construct(protected ServiceReferenceRepository $serviceReferenceRepository)
    {
        parent::__construct('ServiceReferenceRepository');
    }

    public function getServiceReferencesToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->serviceReferenceRepository->getServiceReferencesToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
