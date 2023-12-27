<?php

namespace App\Livewire\Admin\Pets\Components;

use Livewire\Component;

class InfoTab extends Component
{
    public $pet;

    public function render()
    {
        return view('livewire.admin.pets.components.info-tab');
    }
}
