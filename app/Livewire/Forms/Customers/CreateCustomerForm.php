<?php

namespace App\Livewire\Forms\Customers;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateCustomerForm extends Form
{
    #[Rule(['required', 'min:3'])]
    public $name;

    #[Rule(['required', 'email'])]
    public $email;

    #[Rule(['required'])]
    public $cellphone;

    public $cpf;

    public $rg;

    public $gender;

    public $phone;

    public $alternateContactName;

    public $alternateContactCellphone;

    #[Rule(['required'])]
    public $zipCode;

    #[Rule(['required'])]
    public $address;

    #[Rule(['required'])]
    public $city;

    #[Rule(['required'])]
    public $state;

    #[Rule(['required'])]
    public $district;

    #[Rule(['required'])]
    public $addressNumber;

    public $addressComplement;
}
