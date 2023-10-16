<?php

namespace App\Repositories;

use App\Models\DaycareBooking;
use Illuminate\Database\Eloquent\Collection;
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
                $query->whereHas('pet', function ($query) use ($searchTerms) {
                    $query->where('name', 'like', '%'.$searchTerms.'%');
                });
            });
        }
        if (! empty($filters)) {
            $query = $query->where($filters);
        }

        return $query->orderBy($orderBy, $orderDirection)->paginate($limit);
    }

    public function isBooking(int $petId): bool
    {
        return $this->model->where('pet_id', $petId)->whereDate('date', now()->format('Y-m-d'))->whereNull('exit_time')->exists();
    }

    public function getCheckInToday(): Collection
    {
        return $this->model->whereDate('date', now()->format('Y-m-d'))->whereNull('exit_time')->get();
    }
}
