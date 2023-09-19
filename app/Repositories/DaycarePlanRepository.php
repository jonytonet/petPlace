<?php

namespace App\Repositories;

use App\Models\DaycarePlan;
use Illuminate\Pagination\LengthAwarePaginator;

class DaycarePlanRepository extends BaseRepository
{
    protected $model;

    public function __construct(DaycarePlan $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return DaycarePlan::class;
    }

    public function getDaycarePlansToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
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
}
