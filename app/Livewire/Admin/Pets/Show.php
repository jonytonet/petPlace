<?php

namespace App\Livewire\Admin\Pets;

use Livewire\Component;

class Show extends Component
{
    public $pet;

    public function render()
    {

        return view('livewire.admin.pets.show');
    }

    public function goBack()
    {
        return redirect()->to('/dashboard');
    }
}
