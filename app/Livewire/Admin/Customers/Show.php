<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;

class Show extends Component
{
    public $customer;

    public function render()
    {

        return view('livewire.admin.customers.show');
    }

    public function goIndex()
    {
        return redirect()->to('/admin/clientes');
    }
}
