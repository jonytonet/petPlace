<?php

namespace App\Livewire\Forms\Daycare;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateOrEditDaycarePlanForm extends Form
{

    public $planId;
    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $name;
    public $description;

    public function save()
    {
        $this->validate();
        if ($this->planId) {
            if (app()->make(DaycarePlanService::class)->update(['name' => $this->name, 'description' => $this->description, ], $this->planId)) {
                $this->clearProprieties();

                return true;
            }

            return false;
        } else {
            if (app()->make(DaycarePlanService::class)->create(['name' => $this->name, 'description' => $this->description, ])) {
                $this->clearProprieties();

                return true;
            }

            return false;
        }

    }

    public function clearProprieties()
    {
        $this->planId = null;
        $this->name = null;
        $this->description = null;

    }
}
