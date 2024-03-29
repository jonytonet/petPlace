<?php

namespace App\Services;

use App\Models\BathAndGroomingControl;
use App\Repositories\BathAndGroomingControlRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class BathAndGroomingControlService extends BaseService
{
    public function __construct(protected BathAndGroomingControlRepository $bathAndGroomingControlRepository)
    {
        parent::__construct('BathAndGroomingControlRepository');
    }

    public function getBathAndGroomingControlsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->bathAndGroomingControlRepository->getBathAndGroomingControlsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }

    public function getPlanControlByPetId(int $petId): ?BathAndGroomingControl
    {
        return $this->bathAndGroomingControlRepository->getPlanControlByPetId($petId);
    }

    public function getAllPlanControlByPetId(int $petId): LengthAwarePaginator
    {
        return $this->bathAndGroomingControlRepository->getAllPlanControlByPetId($petId);
    }
}
