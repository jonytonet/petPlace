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

    public function getDaycareEnrollmentsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->daycareEnrollmentRepository->getDaycareEnrollmentsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }


}
