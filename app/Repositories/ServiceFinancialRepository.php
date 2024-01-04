<?php

namespace App\Repositories;

use App\Models\ServiceFinancial;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceFinancialRepository extends BaseRepository
{
    protected $model;

    public function __construct(ServiceFinancial $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return ServiceFinancial::class;
    }

    public function getServiceFinancialsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        $query = $this->model;
        if ($searchTerms) {
            $query = $query->where(function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', '%'.$searchTerms.'%');
            });
        }
        if (! empty($filters)) {
            $query = $query->where($filters);
        }

        return $query->orderBy($orderBy, $orderDirection)->paginate($limit);
    }

    public function destroyByServiceReference(int $serviceReferenceId): bool
    {
        return $this->model->where('service_reference_id', $serviceReferenceId)->delete();
    }

    public function getServiceFinancialsByUser(int $userId, ?string $reference, ?string $orderBy, ?string $orderDirection): LengthAwarePaginator
    {
        $query = $this->model->where('user_id', $userId);
        if ($reference) {
            $query = $query->whereHas('serviceReference', function ($query) use ($reference) {
                $query->where('reference', 'LIKE', '%'.$reference.'%');
            });
        }

        return $query->orderBy($orderBy, $orderDirection)->paginate(50);
    }
}
