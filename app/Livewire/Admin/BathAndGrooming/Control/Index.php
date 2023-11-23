<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Services\PetService;
use Livewire\Component;

class Index extends Component
{
    public $form = [];

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
}
