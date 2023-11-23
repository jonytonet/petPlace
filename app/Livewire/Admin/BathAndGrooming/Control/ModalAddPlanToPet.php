<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Services\BathAndGroomingPlanService;
use App\Services\PetService;
use Livewire\Component;

class ModalAddPlanToPet extends Component
{
    public function render()
    {
        return view(
            'livewire.admin.bath-and-grooming.control.modal-add-plan-to-pet',
            [
                'pets' => app()->make(PetService::class)->all(),
                'plans' => app()->make(BathAndGroomingPlanService::class)->all(),
            ]
        );
    }
}
