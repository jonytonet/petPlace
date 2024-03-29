<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Attributes\On;
use Livewire\Component;

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
        $this->showTable = ! $this->showTable;
    }
}
