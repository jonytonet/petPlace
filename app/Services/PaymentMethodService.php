<?php

namespace App\Services;

use App\Repositories\PaymentMethodRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentMethodService extends BaseService
{
    public function __construct(protected PaymentMethodRepository $paymentMethodRepository)
    {
        parent::__construct('PaymentMethodRepository');
    }

    public function getPaymentMethodsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->paymentMethodRepository->getPaymentMethodsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
