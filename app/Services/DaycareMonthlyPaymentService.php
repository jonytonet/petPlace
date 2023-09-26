<?php

namespace App\Services;

use App\Models\Pet;
use App\Repositories\DaycareMonthlyPaymentRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Fluent;

class DaycareMonthlyPaymentService extends BaseService
{
    public function __construct(protected DaycareMonthlyPaymentRepository $daycareMonthlyPaymentRepository)
    {
        parent::__construct('DaycareMonthlyPaymentRepository');
    }

    public function getDaycareMonthlyPaymentsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->daycareMonthlyPaymentRepository->getDaycareMonthlyPaymentsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }


    public function getDataDaycareMonthlyPayment(Pet $pet): Fluent
    {
        $enrollment = $pet->daycareEnrollment;
        $plan = $enrollment->plan;
        return new Fluent([

        ]);
    }
}
