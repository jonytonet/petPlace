<?php

namespace App\Livewire\Admin\Pets;

use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url]
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
        }
    }
}
