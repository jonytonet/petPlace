<?php

namespace App\Livewire\Forms\MiscellaneousRecords;

use App\Services\SpecieService;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateOrEditSpecieForm extends Form
{
    public $specieId;
    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $name;
    public $description;


    public function save()
    {
        $this->validate();
        if ($this->specieId) {
            if (app()->make(SpecieService::class)->update(['name' => $this->name, 'description' => $this->description], $this->specieId)) {
                $this->clearProprieties();
                return true;
            }
            return false;
        } else {
            if (app()->make(SpecieService::class)->create(['name' => $this->name, 'description' => $this->description])) {
                $this->clearProprieties();
                return true;
            }
            return false;
        }

    }

    public function clearProprieties()
    {
        $this->name = '';
        $this->description = '';
        $this->specieId = '';
    }
}
