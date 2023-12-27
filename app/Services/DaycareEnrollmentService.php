<?php

namespace App\Services;

use App\Models\DaycareEnrollment;
use App\Repositories\DaycareEnrollmentRepository;
use Illuminate\Database\Eloquent\Collection;
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

    public function getActiveEnrollments(): Collection
    {
        return $this->daycareEnrollmentRepository->getActiveEnrollments();
    }

    public function getActiveEnrollmentByPet(int $petId): ?DaycareEnrollment
    {
        return $this->daycareEnrollmentRepository->getActiveEnrollmentByPet($petId);
    }

    public function getAllEnrollmentsByPet(int $petId): LengthAwarePaginator
    {
        return $this->daycareEnrollmentRepository->getAllEnrollmentsByPet($petId);
    }
}
