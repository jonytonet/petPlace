<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.bath-and-grooming.control.index');
    }

    public function goToPlans()
    {
        return redirect()->route('bathAndGrooming.plans');
    }
}
