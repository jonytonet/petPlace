<?php

namespace App\Services;

use App\Repositories\VeterinarianRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class VeterinarianService extends BaseService
{
    public function __construct(protected VeterinarianRepository $veterinarianRepository)
    {
        parent::__construct('VeterinarianRepository');
    }


}
