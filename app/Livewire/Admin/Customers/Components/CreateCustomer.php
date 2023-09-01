<?php

namespace App\Livewire\Admin\Customers\Components;

use App\Services\customer\CustomerService;
use Livewire\Component;

class CreateCustomer extends Component
{
    public $zipCode;
    public $address = '';
    public $city = '';
    public $state = '';
    public $district = '';
    public function render()
    {
        return view('livewire.admin.customers.components.create-customer');
    }


    public function getZipCode()
    {
        $result = app()->make(CustomerService::class)->getZipCode($this->zipCode);

        if ($result) {
            $this->address = $result->logradouro;
            $this->city = $result->localidade;
            $this->district = $result->bairro;
            $this->state = $result->uf;
        }

    }



}
