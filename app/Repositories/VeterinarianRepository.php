<?php

namespace App\Repositories;

use App\Models\Veterinarian;
use Illuminate\Pagination\LengthAwarePaginator;

class VeterinarianRepository extends BaseRepository
{
    protected $model;

    public function __construct(Veterinarian $model)
    {
        $this->model = $model;
    }

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return Veterinarian::class;
    }


}
