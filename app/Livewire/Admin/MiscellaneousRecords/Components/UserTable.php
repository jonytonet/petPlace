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
        if ($this->formBreed->save()) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro salvo com sucesso', 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar gravar a Raça! Tente novamente.', 'icon' => 'error']);

    }

    public function editUser(int $id)
    {
        /*  $breed = app()->make(BreedService::class)->find($id);
         if ($breed) {
             $this->formBreed->breedId = $id;
             $this->formBreed->specieId = $breed->specie_id;
             $this->formBreed->name = $breed->name;
             $this->formBreed->description = $breed->description;
             $this->dispatch('editBreed', $breed);

             return;
         }
  */
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar recuperar a Raça! Tente novamente,', 'icon' => 'error']);
    }

    public function destroyUser(int $id)
    {

    }

    public function addUser()
    {

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
