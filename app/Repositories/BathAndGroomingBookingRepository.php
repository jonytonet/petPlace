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

    public function getBathAndGroomingBookingsToTable(?string $searchTerms, ?array $filters, int $limit, array $tutorFilter, array $petFilter): LengthAwarePaginator
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

        if (! empty($tutorFilter)) {
            $query = $query->whereHas('pet.user', function ($query) use ($tutorFilter) {
                $query->where($tutorFilter);
            });
        }

        if (! empty($petFilter)) {
            $query = $query->whereHas('pet', function ($query) use ($petFilter) {
                $query->where($petFilter);
            });
        }

        return $query->orderBy('bath_date')->orderBy('bath_time')->paginate($limit);
    }
}
