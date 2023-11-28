<?php

namespace App\Livewire\Forms\Customers;

use App\Services\CustomerService;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateCustomerForm extends Form
{
    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    #[Rule('min:3', onUpdate: false, message: 'Mínimo 3 caracteres!')]
    public $name;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    #[Rule('email', onUpdate: false, message: 'Email invalido!')]
    public $email;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $cellphone;

    public $cpf;

    public $rg;

    public $gender;

    public $phone;

    public $alternateContactName;

    public $alternateContactCellphone;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $zipCode;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $address;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $city;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $state;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $district;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $addressNumber;

    public $addressComplement;

    public function createCustomer()
    {
        $this->validate();

        return app()->make(CustomerService::class)->createCustomer(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => rand(11111111, 99999999),
                'user_type_id' => 4,
                'cpf' => $this->cpf,
                'rg' => $this->rg,
                'gender' => $this->gender,
                'cellphone_number' => $this->cellphone,
                'phone_number' => $this->phone,
                'alternate_contact_name' => $this->alternateContactName,
                'alternate_contact_cellphone_number' => $this->alternateContactCellphone,
            ],
            [
                'zip_code' => $this->zipCode,
                'address' => $this->address,
                'number' => $this->addressNumber,
                'complement' => $this->addressComplement,
                'district' => $this->district,
                'city' => $this->city,
                'state' => $this->state,
            ]
        );
    }

    public function clearForm()
    {
        $this->name = '';
        $this->email = '';
        $this->cpf = '';
        $this->rg = '';
        $this->gender = '';
        $this->cellphone = '';
        $this->phone = '';
        $this->alternateContactName = '';
        $this->alternateContactCellphone = '';
        $this->zipCode = '';
        $this->address = '';
        $this->addressComplement = '';
        $this->district = '';
        $this->city = '';
        $this->state = '';

    }
}
