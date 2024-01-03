<?php

namespace App\Livewire\Admin\Customers\Components;

use Livewire\Component;

class PetsTab extends Component
{
    public $customer;

    public function render()
    {

        return view('livewire.admin.customers.components.pets-tab', ['pets' => $this->customer->pets]);
    }

    public function goToPet($id)
    {
        return redirect()->to('/admin/pet/'.$id);
    }
}
