<?php

namespace App\Services;

use App\Models\DaycareDailyCredit;
use App\Repositories\DaycareDailyCreditRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class DaycareDailyCreditService extends BaseService
{
    public function __construct(protected DaycareDailyCreditRepository $daycareDailyCreditRepository)
    {
        parent::__construct('DaycareDailyCreditRepository');
    }

    public function getDaycareDailyCreditsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->daycareDailyCreditRepository->getDaycareDailyCreditsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }

    public function getValidDailyDaycareCredit(int $enrollmentId): ?DaycareDailyCredit
    {
        return $this->daycareDailyCreditRepository->getValidDailyDaycareCredit($enrollmentId);
    }
}
