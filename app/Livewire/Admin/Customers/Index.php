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

    public function toggleShowTable()
    {
        $this->showTable = !$this->showTable;
    }

    #[On('createCustomerSuccess')]
    public function visibleTable()
    {
        $this->showTable = true;
    }
    #[On('closeTable')]
    public function closeTable()
    {
        $this->showTable = false;
    }
}
