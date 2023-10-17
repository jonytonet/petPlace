<?php

namespace App\Repositories;

use App\Models\DaycareDailyCredit;
use Illuminate\Pagination\LengthAwarePaginator;

class DaycareDailyCreditRepository extends BaseRepository
{
    protected $model;

    public function __construct(DaycareDailyCredit $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return DaycareDailyCredit::class;
    }

    public function getDaycareDailyCreditsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        $query = $this->model;
        if ($searchTerms) {
            $query = $query->where(function ($query) use ($searchTerms) {
                $query->where('id', 'LIKE', '%'.$searchTerms.'%');
            });
        }
        if (! empty($filters)) {
            $query = $query->where($filters);
        }

        return $query->orderBy($orderBy, $orderDirection)->paginate($limit);
    }
}
