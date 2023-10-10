<?php

namespace App\Repositories;

use App\Models\DaycareMonthlyPayment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class DaycareMonthlyPaymentRepository extends BaseRepository
{
    protected $model;

    public function __construct(DaycareMonthlyPayment $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return DaycareMonthlyPayment::class;
    }

    public function getDaycareMonthlyPaymentsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        $query = $this->model;
        if ($searchTerms) {
            $query = $query->where(function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', '%' . $searchTerms . '%');
            });
        }
        if (!empty($filters)) {
            $query = $query->where($filters);
        }

        return $query->orderBy($orderBy, $orderDirection)->paginate($limit);
    }

    public function getDataDaycareMonthlyPaymentByPetId(int $petId): LengthAwarePaginator
    {
        return $this->model->whereHas('daycareEnrollment.pet', function ($query) use ($petId) {
            $query->where('id', $petId);
        })->orderBy('reference_month', 'DESC')->paginate(12);
    }

}
