<?php

namespace App\Livewire\Admin\Pets;

use Livewire\Component;

class Index extends Component
{
    public $customersId;

    public bool $showTable = true;

    public function render()
    {
        return view('livewire.admin.pets.index');
    }

    public function toggleShowTable()
    {
        $this->showTable = ! $this->showTable;
    }

    public function mount()
    {
        if ($this->customersId) {
            $this->showTable = false;
            $this->dispatch('createPetForCustomer', ['customersId' => $this->customersId]);
        }
    }
}
