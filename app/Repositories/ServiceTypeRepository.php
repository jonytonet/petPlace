<?php

namespace App\Repositories;

use App\Models\ServiceType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceTypeRepository extends BaseRepository
{
    protected $model;

    public function __construct(ServiceType $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return ServiceType::class;
    }

    public function getServiceTypesToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
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

    public function getBathAndGroomingServices(): Collection
    {
        return $this->model->where('department', 'bathAndGrooming')->orderBy('name')->get();
    }
}
