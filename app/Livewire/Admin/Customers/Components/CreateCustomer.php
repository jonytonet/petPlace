<?php

namespace App\Livewire\Admin\Customers\Components;

use App\Livewire\Forms\Customers\CreateCustomerForm;
use App\Services\CustomerService;
use Livewire\Component;

class CreateCustomer extends Component
{
    public CreateCustomerForm $form;

    public function render()
    {
        return view('livewire.admin.customers.components.create-customer');
    }

    public function getZipCode(string $zipCode)
    {
        $result = app()->make(CustomerService::class)->getZipCode($zipCode);

        if ($result) {

            $this->dispatch('getAddress', [
                'address' => $result->logradouro,
                'city' => $result->localidade,
                'district' => $result->bairro,
            ]);
            $this->form->state = $result->uf;

        }

    }

    public function save(bool $goToCreatePet)
    {
        dd($goToCreatePet);
    }
}
