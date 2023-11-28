<?php

namespace App\Livewire\Admin\MiscellaneousRecords\Components;

use App\Livewire\Forms\MiscellaneousRecords\CreateOrEditUserForm;
use App\Services\UserService;
use App\Services\UserTypeService;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $searchTermsUser;

    public $userTypes = [];

    public $filters = [];

    public $formVet = false;

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 5;

    public $species = [];

    public CreateOrEditUserForm $formUser;

    public function render()
    {

        return view(
            'livewire.admin.miscellaneous-records.components.user-table',
            ['users' => app()->make(UserService::class)->getUsersToTable($this->searchTermsUser, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit)]

        );
    }

    public function mount()
    {
       $this->userTypes = app()->make(UserTypeService::class)->all();
    }

    public function createOrEditUser()
    {
        $result = $this->formUser->save();
        if ($result['status'] == 'success') {
            $this->dispatch('sweetAlert', ['msg' => $result['message'], 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => $result['message'], 'icon' => 'error']);

    }

    public function editUser(int $id)
    {
        $vet = ['qualification' => null, 'crmv' => null];
        $user = app()->make(UserService::class)->find($id);
        if ($user) {
            $this->formUser->userType = $user->user_type_id;
            $this->formUser->userId = $user->id;
            $this->formUser->name = $user->name;
            $this->formUser->email = $user->email;
            $this->formUser->gender = $user->gender;
            $this->formUser->password = null;
            $this->formUser->cellphone_number = $user->cellphone_number;
            $this->formUser->cpf = $user->cpf;
            $this->formUser->rg = $user->rg;
            if ($user->user_type_id == 2) {
                $this->formUser->qualification = $user->veterinarian->qualification;
                $this->formUser->crmv = $user->veterinarian->crmv;
                $vet['qualification'] = $user->veterinarian->qualification;
                $vet['crmv'] = $user->veterinarian->crmv;
                $this->dispatch('showFormVet', true);
            }

            $this->dispatch('editUser', $user, $vet);

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar recuperar a Raça! Tente novamente,', 'icon' => 'error']);
    }

    public function destroyUser(int $id)
    {
        $this->formUser->destroy($id);
    }

    public function addUser()
    {
        $this->formUser->clear();
        $this->dispatch('addUser');
    }

    public function checkUserType()
    {
        if ($this->formUser->userType == 2) {

            $this->formVet = true;
        } else {
            $this->formVet = false;
        }

        $this->dispatch('showFormVet', $this->formVet);
    }
}
