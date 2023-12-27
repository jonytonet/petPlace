<?php

namespace App\Livewire\Admin\Pets\Components;

use App\Services\BathAndGroomingBookingService;
use App\Services\BathAndGroomingControlService;
use Livewire\Component;

class BathAndGroomingTab extends Component
{
    public $pet;

    public function render()
    {

        return view(
            'livewire.admin.pets.components.bath-and-grooming-tab',
            [
                'plans' => app()->make(BathAndGroomingControlService::class)->getAllPlanControlByPetId($this->pet->id),
                'activePlan' => app()->make(BathAndGroomingControlService::class)->getPlanControlByPetId($this->pet->id),
                'baths' => app()->make(BathAndGroomingBookingService::class)->getAllBathsByPetId($this->pet->id),
            ]
        );
    }
}
