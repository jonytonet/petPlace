<?php

namespace App\Services;

use App\Repositories\VeterinaryRecordRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class VeterinaryRecordService extends BaseService
{
    public function __construct(protected VeterinaryRecordRepository $VeterinaryRecordRepository)
    {
        parent::__construct('VeterinaryRecordRepository');
    }

    public function getVeterinaryRecordsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        return $this->VeterinaryRecordRepository->getVeterinaryRecordsToTable($searchTerms, $filters, $orderBy, $orderDirection, $limit);
    }
}
