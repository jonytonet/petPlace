<?php

namespace App\Services;

use App\Repositories\DaycareMonthlyPaymentRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

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

    public function getDataDaycareMonthlyPaymentByPetId(int $petId): LengthAwarePaginator
    {
        return $this->daycareMonthlyPaymentRepository->getDataDaycareMonthlyPaymentByPetId($petId);
    }

    public function isPaymentDelayed($dueDate, $lastPayment, $monthReference)
    {
        $today = Carbon::now();
        $payDay = $today->copy()->setDay($dueDate);

        if ($today > $payDay) {
            if (Carbon::parse($lastPayment) < $payDay) {

                if (Carbon::parse($monthReference)->format('Y-m') !== $today->format('Y-m')) {
                    return true;
                }
            }
        }

        return false;
    }
}
