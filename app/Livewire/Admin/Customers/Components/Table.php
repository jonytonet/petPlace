<?php

namespace App\Livewire\Admin\Customers\Components;

use App\Services\CustomerService;
use Livewire\Component;
use Livewire\Attributes\On;

class Table extends Component
{
    public $customers = [];
    public function render()
    {
        return view('livewire.admin.customers.components.table', ['customers' => $this->customers]);
    }


    public function mount()
    {
        $this->getData();
    }

    #[On('createCustomerSuccess')]
    public function getData()
    {
        $this->customers = app()->make(CustomerService::class)->getCustomers();
    }
}
