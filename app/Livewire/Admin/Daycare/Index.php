<?php

namespace App\Livewire\Admin\Daycare;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.daycare.index');
    }

    public function goToHistoric()
    {
        return redirect()->route('daycare.historic');
    }

    public function goToPlans()
    {
        return redirect()->route('daycare.plans');
    }

    public function goToEnrollment()
    {
        return redirect()->route('daycare.enrollment');
    }
}
