<?php

namespace App\Livewire\Admin\Pets\Components;

use App\Livewire\Forms\Pet\CreatePetForm;
use App\Services\BreedService;
use App\Services\CustomerService;
use App\Services\SpecieService;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePet extends Component
{
    use WithFileUploads;

    #[Rule('image|max:1024')] // 1MB Max
    public $photo;

    public $customers = [];

    public $species = [];

    public $breeds = [];

    public CreatePetForm $form;

    public function render()
    {
        return view('livewire.admin.pets.components.create-pet');
    }

    public function mount()
    {
        $this->customers = app()->make(CustomerService::class)->getAllCustomers();
        $this->species = app()->make(SpecieService::class)->all();
        $this->breeds = app()->make(BreedService::class)->all();
    }

    public function save()
    {
        $this->form->validate();

        $directory = 'public/assets/images/pets';
        if (! Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }

        $filename = uniqid().'.'.$this->photo->getClientOriginalExtension();
        $path = $this->photo->storeAs($directory, $filename);
        dd($filename, $path);
        $this->form->image = $path;
        $this->form->save();
    }
}
