<?php

namespace App\Services;

use App\Repositories\DaycareBookingRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DaycareBookingService extends BaseService
{
    public function __construct(protected DaycareBookingRepository $daycareBookingRepository)
    {
        parent::__construct('DaycareBookingRepository');
    }

    public function getDaycareBookingsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->daycareBookingRepository->getDaycareBookingsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
