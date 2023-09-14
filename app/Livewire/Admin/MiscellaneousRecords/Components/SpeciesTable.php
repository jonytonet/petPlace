<?php

namespace App\Livewire\Admin\MiscellaneousRecords\Components;

use App\Livewire\Forms\MiscellaneousRecords\CreateOrEditSpecieForm;
use App\Services\SpecieService;
use Livewire\Component;
use Livewire\WithPagination;

class SpeciesTable extends Component
{
    use WithPagination;

    public $searchTerms;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 5;

    public $modalLabel = 'Cadastrar Especie';

    public CreateOrEditSpecieForm $form;

    public function render()
    {
        return view(
            'livewire.admin.miscellaneous-records.components.species-table',
            ['species' => app()->make(SpecieService::class)->getSpeciesToTable($this->searchTerms, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit)]
        );
    }

    public function createOrEditSpecie(): void
    {
        if ($this->form->save()) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro salvo com sucesso', 'icon' => 'success']);

            return /* redirect(request()->header('Referer')) */;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar gravar a Especie! Tente novamente.', 'icon' => 'error']);

    }

    public function editSpecie(int $id): void
    {
        $this->modalLabel = 'Editar Especie';
        $specie = app()->make(SpecieService::class)->find($id);
        if ($specie) {
            $this->form->specieId = $id;
            $this->form->name = $specie->name;
            $this->form->description = $specie->description;
            $this->dispatch('editSpecie', $specie);

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar recuperar a Especie! Tente novamente.', 'icon' => 'error']);
    }

    public function destroySpecie(int $id): void
    {
        if (app()->make(SpecieService::class)->destroy($id)) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro deletado com sucesso', 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar deletar a Especie! Tente novamente.', 'icon' => 'error']);

    }

    public function addSpecie(): void
    {
        $this->modalLabel = 'Cadastrar Especie';
        $this->form->specieId = '';
        $this->form->name = '';
        $this->form->description = '';
        $this->dispatch('addSpecie');
    }
}
