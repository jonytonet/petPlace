<?php

namespace App\Livewire\Admin\Customers\Components;

use App\Services\customer\CustomerService;
use Livewire\Component;

class CreateCustomer extends Component
{
    public ?string $zipCode;
    public ?string $address;
    public ?string $city;
    public ?string $state;
    public ?string $district;
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
