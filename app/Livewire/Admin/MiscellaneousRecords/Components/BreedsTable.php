<?php

namespace App\Livewire\Admin\MiscellaneousRecords\Components;

use App\Livewire\Forms\MiscellaneousRecords\CreateOrEditBreedForm;
use App\Services\BreedService;
use App\Services\SpecieService;
use Livewire\Component;
use Livewire\WithPagination;

class BreedsTable extends Component
{
    use WithPagination;

    public $searchTermsBreed;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 15;

    public $species = [];

    public CreateOrEditBreedForm $formBreed;

    public function render()
    {
        $this->species = app()->make(SpecieService::class)->all();

        return view(
            'livewire.admin.miscellaneous-records.components.breeds-table',
            ['breeds' => app()->make(BreedService::class)->getBreedsToTable($this->searchTermsBreed, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit)]
        );
    }

    public function createOrEditBreed()
    {
        if ($this->formBreed->save()) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro salvo com sucesso', 'icon' => 'success']);

            return /* redirect(request()->header('Referer')) */;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar gravar a Raça! Tente novamente.', 'icon' => 'error']);

    }

    public function editBreed(int $id)
    {
        $breed = app()->make(BreedService::class)->find($id);
        if ($breed) {
            $this->formBreed->breedId = $id;
            $this->formBreed->specieId = $breed->specie_id;
            $this->formBreed->name = $breed->name;
            $this->formBreed->description = $breed->description;
            $this->dispatch('editBreed', $breed);

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar recuperar a Raça! Tente novamente,', 'icon' => 'error']);
    }

    public function destroyBreed(int $id)
    {
        if (app()->make(BreedService::class)->destroy($id)) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro deletado com sucesso', 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar deletar a Raça! Tente novamente.', 'icon' => 'error']);
    }

    public function addBreed()
    {
        $this->formBreed->breedId = '';
        $this->formBreed->specieId = '';
        $this->formBreed->name = '';
        $this->formBreed->description = '';
        $this->dispatch('addBreed');
    }
}
