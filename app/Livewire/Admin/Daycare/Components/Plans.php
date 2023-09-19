<?php

namespace App\Livewire\Admin\Daycare\Components;

use Livewire\Component;

class Plans extends Component
{
    public function render()
    {
        return view('livewire.admin.daycare.components.plans');
    }

    public function goToIndex()
    {
        return redirect()->route('daycare.index');
    }
}
