<?php

namespace App\Livewire\Admin\Customers\Components;

use App\Livewire\Forms\Customers\CreateCustomerForm;
use App\Services\CustomerService;
use Illuminate\Support\Fluent;
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
            $this->form->address = $result->logradouro;
            $this->form->district = $result->bairro;
            $this->form->city = $result->localidade;
            $this->form->state = $result->uf;

        }

    }

    public function save(bool $goToCreatePet)
    {
        $this->dispatch('sweetAlert', ['msg' => 'teste', 'icon' => 'success']);
        $result = $this->form->createCustomer();
        if ($result['status'] == 'success') {
            $this->dispatch('sweetAlert', ['msg' => $result['msg'], 'icon' => 'success']);

        } else {
            $this->dispatch('sweetAlert', ['msg' => $result['msg'], 'icon' => 'error']);
        }

        if($goToCreatePet){
            // ir para rota de cadastro de pets
        }
        $this->dispatch('createCustomerSuccess');
        return;

    }
}
