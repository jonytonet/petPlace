<?php

namespace App\Repositories;

use App\Models\DaycareEnrollment;
use Illuminate\Pagination\LengthAwarePaginator;

class DaycareEnrollmentRepository extends BaseRepository
{
    protected $model;

    public function __construct(DaycareEnrollment $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return DaycareEnrollment::class;
    }

    public function getDaycareEnrollmentsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
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
