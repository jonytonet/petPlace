<?php

namespace App\Livewire\Admin\Daycare\Components;

use Livewire\Component;

class Enrollment extends Component
{
    public function render()
    {
        return view('livewire.admin.daycare.components.enrollment');
    }

    public function goToIndex()
    {
        return redirect()->route('daycare.index');
    }
}
