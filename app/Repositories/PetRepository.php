<?php

namespace App\Repositories;

use App\Models\Pet;
use Illuminate\Pagination\LengthAwarePaginator;

class PetRepository extends BaseRepository
{
    protected $model;

    public function __construct(Pet $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return User::class;
    }

    public function getPetsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        $query = $this->model;
        if ($searchTerms) {
            $query = $query->where(function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', '%'.$searchTerms.'%')->orWhere('email', 'LIKE', '%'.$searchTerms.'%')->orWhere('alternate_contact_name', 'LIKE', '%'.$searchTerms.'%');
            });
        }
        if (! empty($filters)) {
            $query = $query->where($filters);
        }

        return $query->orderBy($orderBy, $orderDirection)->paginate($limit);
    }
}
