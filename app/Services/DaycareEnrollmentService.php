<?php

namespace App\Services;

use App\Repositories\DaycareEnrollmentRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DaycareEnrollmentService extends BaseService
{
    public function __construct(protected DaycareEnrollmentRepository $daycareEnrollmentRepository)
    {
        parent::__construct('DaycareEnrollmentRepository');
    }

    public function getDaycareEnrollmentsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit, bool $onlyActive): LengthAwarePaginator
    {
        return $this->daycareEnrollmentRepository->getDaycareEnrollmentsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit, $onlyActive);
    }

    public function existActiveEnrollmentByPetId(int $petId): bool
    {
        return $this->daycareEnrollmentRepository->existActiveEnrollmentByPetId($petId);
    }
}
