<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository extends BaseRepository
{
    protected $model;

    public function __construct(User $model)
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

    public function getCustomersToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        $query = $this->model->where('user_type_id', 4)->where('active', 1);
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

    public function getAllCustomers(): Collection
    {
        return $this->model->where('user_type_id', 4)->where('active', 1)->orderBy('name', 'DESC')->get();
    }

    public function getUsersToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit = 15): LengthAwarePaginator
    {
        $query = $this->model->where('user_type_id', '!=', 4)->where('active', 1);
        if ($searchTerms) {
            $query = $query->where(function ($query) use ($searchTerms) {
                $query->where('name', 'LIKE', '%'.$searchTerms.'%')->orWhere('email', 'LIKE', '%'.$searchTerms.'%');
            });
        }
        if (! empty($filters)) {
            $query = $query->where($filters);
        }

        return $query->orderBy($orderBy, $orderDirection)->paginate($limit);
    }

    public function getUsers(): Collection
    {
        return $this->model->where('user_type_id', '!=', 4)->where('active', 1)->orderBy('name', 'DESC')->get();
    }
}
