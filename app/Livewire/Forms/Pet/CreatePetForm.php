<?php

namespace App\Livewire\Forms\Pet;

use Livewire\Attributes\Rule;
use Livewire\Form;

class CreatePetForm extends Form
{
    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $specieId;
    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $userId;
    public $image;
    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $name;
    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $species;
    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $breed;
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
        $this->validate();
    }




}
