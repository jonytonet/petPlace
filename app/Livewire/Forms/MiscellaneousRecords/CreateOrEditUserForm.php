<?php

namespace App\Livewire\Forms\MiscellaneousRecords;

use App\Services\UserService;
use Livewire\Form;

class CreateOrEditUserForm extends Form
{
    public $userId;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $userType;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $name;

    #[Rule(['required', 'unique:email', 'email'], onUpdate: false, message: 'Campo obrigatório!')]
    public $email;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $password;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $passwordConfirm;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $gender;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $cellphone;

    public $cpf;

    public $rg;

    public $qualification;

    public $crmv;

    public function save()
    {
        $this->validate();
        if ($this->userId) {
            if (app()->make(UserService::class)->update([], $this->userId)) {

                /* if( $this->userType == 2){

                } */
                return true;
            }

            return false;
        } else {
            if (app()->make(SpecieService::class)->create(['name' => $this->name])) {

                return true;
            }

            return false;
        }

    }
}
