<?php

namespace App\Livewire\Forms\Pet;

use App\Services\PetService;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Form;
use Livewire\WithFileUploads;

class CreatePetForm extends Form
{
    use WithFileUploads;

    #[Url(as: 'customersId')]
    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $userId;

    public $image;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $name;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $specieId;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $breedId;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $gender;

    public $dateOfBirth;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $fur;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $size;

    public $microchip;

    public function save()
    {
        return app()->make(PetService::class)->create([
            'user_id' => $this->userId,
            'image' => $this->image,
            'name' => $this->name,
            'specie_id' => $this->specieId,
            'breed_id' => $this->breedId,
            'gender' => $this->gender,
            'date_of_birth' => $this->dateOfBirth,
            'fur' => $this->fur,
            'size' => $this->size,
            'microchip' => $this->microchip,
        ]);
    }

    public function clearForm()
    {
        $this->userId = null;
        $this->image = null;
        $this->name = null;
        $this->specieId = null;
        $this->breedId = null;
        $this->gender = null;
        $this->dateOfBirth = null;
        $this->image = null;
        $this->size = null;
        $this->microchip = null;
    }
}
