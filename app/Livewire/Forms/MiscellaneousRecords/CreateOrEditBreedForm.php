<?php

namespace App\Livewire\Forms\MiscellaneousRecords;

use App\Services\BreedService;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateOrEditBreedForm extends Form
{
    public $breedId;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $specieId;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $name;

    public $description;

    public function save()
    {
        $this->validate();
        if ($this->breedId) {
            if (app()->make(BreedService::class)->update(['name' => $this->name, 'description' => $this->description, 'specie_id' => $this->specieId], $this->breedId)) {
                $this->clearProprieties();

                return true;
            }

            return false;
        } else {
            if (app()->make(BreedService::class)->create(['name' => $this->name, 'description' => $this->description, 'specie_id' => $this->specieId])) {
                $this->clearProprieties();

                return true;
            }

            return false;
        }

    }

    public function clearProprieties()
    {
        $this->breedId = '';
        $this->name = '';
        $this->description = '';
        $this->specieId = '';
    }
}
