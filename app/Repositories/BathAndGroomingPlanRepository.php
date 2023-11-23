<?php

namespace App\Repositories;

use App\Models\BathAndGroomingPlan;
use Illuminate\Pagination\LengthAwarePaginator;

class BathAndGroomingPlanRepository extends BaseRepository
{
    protected $model;

    public function __construct(BathAndGroomingPlan $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return BathAndGroomingPlan::class;
    }

    public function getBathAndGroomingPlansToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        $query = $this->model;
        if ($searchTerms) {
            $query = $query->where(function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', '%'.$searchTerms.'%')->orWhere('id', 'LIKE', '%'.$searchTerms);
            });
        }
        if (! empty($filters)) {
            $query = $query->where($filters);
        }

        return $query->orderBy($orderBy, $orderDirection)->paginate($limit);
    }
}
