<?php

namespace App\Livewire\Admin\Pets\Components;

use App\Livewire\Forms\Pet\CreatePetForm;
use App\Services\BreedService;
use App\Services\CustomerService;
use App\Services\SpecieService;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePet extends Component
{
    use WithFileUploads;

    #[Rule('image|max:1024')] // 1MB Max
    public $photo;

    #[Url(as: 'customersId')]
    public $customer;

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

    public function save(bool $newPet)
    {
        $directory = 'public/assets/images/pets';
        if (! Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }
        $filename = uniqid().'.'.$this->photo->getClientOriginalExtension();
        $path = $this->photo->storeAs($directory, $filename);
        $this->form->image = $path;
        $this->form->validate();
        if ($this->form->save()) {

            $this->dispatch('sweetAlert', ['msg' => 'Pet cadastrado com sucesso!', 'icon' => 'success']);
            $this->photo = null;
            $this->form->clearForm();
            if ($newPet) {
                $this->dispatch('clearForm');

                return;
            }

            return redirect(request()->header('Referer'));
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao cadastrar o pet!', 'icon' => 'success']);
    }
}
