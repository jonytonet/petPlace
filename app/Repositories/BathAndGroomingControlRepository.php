<?php

namespace App\Repositories;

use App\Models\BathAndGroomingControl;
use Illuminate\Pagination\LengthAwarePaginator;

class BathAndGroomingControlRepository extends BaseRepository
{
    protected $model;

    public function __construct(BathAndGroomingControl $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return BathAndGroomingControl::class;
    }

    public function getBathAndGroomingControlsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
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

    public function getPlanControlByPetId(int $petId): ?BathAndGroomingControl
    {
        return $this->model
            ->whereColumn('baths_number_plan', '>', 'baths_number_used')
            ->where('pet_id', $petId)
            ->first();
    }

    public function getAllPlanControlByPetId(int $petId): LengthAwarePaginator
    {
        return $this->model
            ->where('pet_id', $petId)
            ->orderBy('id', 'DESC')
            ->paginate(15);
    }
}
