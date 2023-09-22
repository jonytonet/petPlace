<?php

namespace App\Repositories;

use App\Models\DaycareBooking;
use Illuminate\Pagination\LengthAwarePaginator;

class DaycareBookingRepository extends BaseRepository
{
    protected $model;

    public function __construct(DaycareBooking $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return DaycareBooking::class;
    }

    public function getDaycareBookingsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
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