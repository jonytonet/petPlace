<?php

namespace App\Repositories;

use App\Models\DaycareEnrollment;
use Illuminate\Database\Eloquent\Collection;
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

    public function getDaycareEnrollmentsToTable(?string $searchTerms, ?array $filters, ?string $orderBy, ?string $orderDirection, int $limit, bool $onlyActive): LengthAwarePaginator
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
        if ($onlyActive) {
            $query = $query->where('active', '=', '1');
        }
        $query = $query->orderBy(function ($query) {
            $query->select('name')
                ->from('pets')
                ->whereColumn('pets.id', 'daycare_enrollments.pet_id');
        }, $orderDirection);

        return $query->paginate($limit);
    }

    public function existActiveEnrollmentByPetId(int $petId): bool
    {
        return $this->model->where('pet_id', $petId)->exists();
    }

    public function getActiveEnrollments(): Collection
    {
        return $this->model->where('active', '=', '1')->get();
    }

    public function getActiveEnrollmentByPet(int $petId): ?DaycareEnrollment
    {
        return $this->model->where('active', '=', '1')->where('pet_id', $petId)->first();
    }

    public function getAllEnrollmentsByPet(int $petId): LengthAwarePaginator
    {
        return $this->model->where('pet_id', $petId)->orderBy('id', 'DESC')->paginate(30);
    }
}
