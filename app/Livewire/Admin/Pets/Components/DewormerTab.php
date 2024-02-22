<?php

namespace App\Livewire\Admin\Pets\Components;

use App\Services\DewormerService;
use App\Services\VaccineService;
use App\Services\VeterinarianService;
use Livewire\Component;

class DewormerTab extends Component
{
    public $pet;

    public function render()
    {
        return view(
            'livewire.admin.pets.components.dewormer-tab',
            [
                'dewormer' => app()->make(DewormerService::class)->getByPetId($this->pet->id),
                'vaccines' => app()->make(VaccineService::class)->getByPetId($this->pet->id),
                'veterinaries' => app()->make(VeterinarianService::class)->all(),
            ]
        );
    }
}
