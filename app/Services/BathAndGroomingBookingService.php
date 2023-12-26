<?php

namespace App\Services;

use App\Repositories\BathAndGroomingBookingRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class BathAndGroomingBookingService extends BaseService
{
    public function __construct(protected BathAndGroomingBookingRepository $bathAndGroomingBookingRepository)
    {
        parent::__construct('BathAndGroomingBookingRepository');
    }

    public function getBathAndGroomingBookingsToTable(?string $searchTerms, ?array $filters, int $limit = 15, array $tutorFilter = [], array $petFilter = []): LengthAwarePaginator
    {
        return $this->bathAndGroomingBookingRepository->getBathAndGroomingBookingsToTable($searchTerms, $filters, $limit, $tutorFilter, $petFilter);
    }
}
