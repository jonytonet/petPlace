<?php

namespace App\Services;

use App\Repositories\ServiceTypeRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceTypeService extends BaseService
{
    public function __construct(protected ServiceTypeRepository $serviceTypeRepository)
    {
        parent::__construct('ServiceTypeRepository');
    }

    public function getServiceTypesToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->serviceTypeRepository->getServiceTypesToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }

    public function getBathAndGroomingServices(): Collection
    {
        return $this->serviceTypeRepository->getBathAndGroomingServices();
    }
}
