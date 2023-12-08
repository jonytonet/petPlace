<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Services\BathAndGroomingControlService;
use App\Services\PetService;
use Livewire\Component;

class Index extends Component
{
    public $petId;

    public $type;

    public function render()
    {
        return view('livewire.admin.bath-and-grooming.control.index',
            [
                'pets' => app()->make(PetService::class)->all(),
            ]
        );
    }

    public function goToPlans()
    {
        return redirect()->route('bathAndGrooming.plans');
    }

    public function checkPlan()
    {
        if ($this->type == 'single') {
            return;
        }

        if (! $this->petId) {
            return;
        }

        if (! $this->type) {
            return;
        }
        app()->make(BathAndGroomingControlService::class)->getPlanControlByPetId($this->petId);
        dd();
    }
}
