<?php

namespace App\Livewire\Forms\MiscellaneousRecords;

use App\Models\User;
use App\Services\UserService;
use App\Services\VeterinarianService;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateOrEditUserForm extends Form {
    public $userId;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $userType;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $name;

    #[Rule('required', message: 'Campo obrigatório!')]
    #[Rule('email', message: 'Campo do tipo email!')]
    #[Rule('unique:'.User::class .',email', message: 'Email já existente ou invalido!')]
    public $email;

    #[Rule('min:8', onUpdate: false, message: 'Senha deve ter no mínimo 8 caracteres!')]
    public $password;

    #[Rule('min:8', onUpdate: false, message: 'Senha deve ter no mínimo 8 caracteres!')]
    public $passwordConfirm;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $gender;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $cellphone;

    public $cpf;

    public $rg;

    public $qualification;

    public $crmv;

    public function save() {

        if($this->userId) {
            if($this->password) {
                if($this->password != $this->password) {
                    return ['status' => 'error', 'message' => 'Senhas não conferem!'];
                }

                $updateUser = app()->make(UserService::class)->update([
                    'user_type_id' => $this->userType,
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => $this->password,
                    'gender' => $this->gender,
                    'cellphone_number' => $this->cellphone,
                    'cpf' => $this->cpf,
                    'rg' => $this->rg,

                ], $this->userId);

            } else {
                $updateUser = app()->make(UserService::class)->update([
                    'user_type_id' => $this->userType,
                    'name' => $this->name,
                    'email' => $this->email,
                    'gender' => $this->gender,
                    'cellphone_number' => $this->cellphone,
                    'cpf' => $this->cpf,
                    'rg' => $this->rg,

                ], $this->userId);
            }
            if($updateUser) {

                if($this->userType == 2) {
                    $veterinarian = $updateUser->veterinarian;
                    $veterinarian->name = $this->name;
                    $veterinarian->qualification = $this->qualification;
                    $veterinarian->crmv = $this->crmv;
                    $veterinarian->update();
                }

                return ['status' => 'success', 'message' => 'Cadastro atualizado com sucesso!'];
            }

            return ['status' => 'error', 'message' => 'Houve um erro insperado!'];
        } else {
            $this->validate();
            $createUser = app()->make(UserService::class)->create([
                'user_type_id' => $this->userType,
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'gender' => $this->gender,
                'cellphone_number' => $this->cellphone,
                'cpf' => $this->cpf,
                'rg' => $this->rg,
            ]);

            if($createUser) {

                if($this->userType == 2) {
                    $vet = app()->make(VeterinarianService::class)->create(
                        [
                            'name' => $this->name,
                            'qualification' => $this->qualification,
                            'crmv' => $this->crmv,
                            'user_id' => $createUser->id,
                        ]
                    );
                    if(!$vet) {
                        return ['status' => 'error', 'message' => 'Houve um erro ao cadastra dados do Veterinário(a)!'];
                    }
                }

                return ['status' => 'success', 'message' => 'Cadastro realizado com sucesso!'];
            }

            return ['status' => 'error', 'message' => 'Houve um erro insperado!'];
        }

    }

    public function destroy($id) {
        if(
            app()->make(UserService::class)->update([
                'active' => false,
            ], $id)
        ) {
            return true;
        }

        return false;
    }

    public function clear() {
        $this->userType = null;
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->gender = null;
        $this->cellphone = null;
        $this->cpf = null;
        $this->rg = null;
        $this->qualification = null;
        $this->crmv = null;
    }
}
