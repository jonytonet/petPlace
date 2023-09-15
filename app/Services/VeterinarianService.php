<?php

namespace App\Services;

use App\Repositories\VeterinarianRepository;

class VeterinarianService extends BaseService
{
    public function __construct(protected VeterinarianRepository $veterinarianRepository)
    {
        parent::__construct('VeterinarianRepository');
    }
}
