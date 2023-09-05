<?php

namespace App\Livewire\Admin\Pets;

use Livewire\Component;

class Index extends Component
{
    public bool $showTable = true;

    public function render()
    {
        return view('livewire.admin.pets.index');
    }

    public function toggleShowTable()
    {
        $this->showTable = ! $this->showTable;
    }
}
