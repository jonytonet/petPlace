<?php

namespace App\Repositories;

use App\Models\BathAndGroomingBooking;
use Illuminate\Pagination\LengthAwarePaginator;

class BathAndGroomingBookingRepository extends BaseRepository
{
    protected $model;

    public function __construct(BathAndGroomingBooking $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return BathAndGroomingBooking::class;
    }

    public function getBathAndGroomingBookingsToTable(?string $searchTerms, ?array $filters, int $limit = 15): LengthAwarePaginator
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

        return $query->orderBy('bath_date')->orderBy('bath_time')->paginate($limit);
    }
}
