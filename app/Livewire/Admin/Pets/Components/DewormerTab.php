<?php

namespace App\Livewire\Admin\Pets\Components;

use Livewire\Component;

class DewormerTab extends Component
{
    public $pet;

    public function render()
    {
        return view('livewire.admin.pets.components.dewormer-tab');
    }
}
