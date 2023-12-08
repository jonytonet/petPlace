<?php

namespace App\Livewire\Forms\MiscellaneousRecords;

use App\Services\ServiceTypeService;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateOrEditServiceTypeForm extends Form
{
    public $serviceTypeId;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $name;

    public $commission;

    public $commission_type;

    public $description;

    public $department;

    public function save()
    {
        $this->validate();
        if ($this->serviceTypeId) {
            if (
                app()->make(ServiceTypeService::class)->update([
                    'name' => $this->name,
                    'description' => $this->description,
                    'commission' => $this->commission,
                    'commission_type' => $this->commission_type,
                    'department' => $this->department,
                ], $this->serviceTypeId)
            ) {
                $this->clearProprieties();

                return true;
            }

            return false;
        } else {
            if (
                app()->make(ServiceTypeService::class)->create([
                    'name' => $this->name,
                    'description' => $this->description,
                    'commission' => $this->commission,
                    'commission_type' => $this->commission_type,
                    'department' => $this->department,
                ])
            ) {
                $this->clearProprieties();

                return true;
            }

            return false;
        }

    }

    public function clearProprieties()
    {
        $this->serviceTypeId = null;
        $this->name = null;
        $this->description = null;
        $this->commission = null;
        $this->commission_type = null;
        $this->department = null;

    }
}
