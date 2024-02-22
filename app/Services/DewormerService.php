<?php

namespace App\Services;

use App\Repositories\DewormerRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DewormerService extends BaseService
{
    public function __construct(protected DewormerRepository $dewormerRepository)
    {
        parent::__construct('DewormerRepository');
    }

    public function getDewormersToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->dewormerRepository->getDewormersToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }

    public function getByPetId(int $petId)
    {
        return $this->dewormerRepository->getByPetId($petId);
    }
}
