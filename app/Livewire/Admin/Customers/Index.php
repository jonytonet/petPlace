<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{
    public bool $showTable = true;

    public function render()
    {
        return view('livewire.admin.customers.index');
    }

    #[On('return-to-table')]
    public function toggleShowTable()
    {
        $this->showTable = !$this->showTable;
    }

}
