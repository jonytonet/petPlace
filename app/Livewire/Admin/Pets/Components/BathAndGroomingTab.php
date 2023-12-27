<?php

namespace App\Livewire\Admin\Pets\Components;

use Livewire\Component;

class BathAndGroomingTab extends Component
{
    public $pet;

    public function render()
    {
        dd($this->pet);

        return view('livewire.admin.pets.components.bath-and-grooming-tab');
    }
}
