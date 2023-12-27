<?php

namespace App\Livewire\Admin\Pets\Components;

use App\Models\Pet;
use App\Services\BreedService;
use App\Services\PetService;
use App\Services\SpecieService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class InfoTab extends Component
{
    use WithFileUploads;

    public $pet;

    public $petInfo;

    public $petEdit = false;

    public $species;

    public $breeds;

    public $photo;

    public function mount()
    {
        $this->petInfo = $this->pet->toArray();
        $this->species = app()->make(SpecieService::class)->all();
        $this->breeds = app()->make(BreedService::class)->all();
    }

    public function render()
    {
        //dd( $this->pet);

        return view('livewire.admin.pets.components.info-tab');
    }

    public function toggleEdit()
    {
        $this->petEdit = ! $this->petEdit;
        if (! $this->petEdit) {
            return redirect(request()->header('Referer'));
        }
    }

    public function save()
    {
        $validate = Pet::validate($this->petInfo);
        if ($validate['status'] == 'error') {
            $this->dispatch('sweetAlert', ['msg' => $validate['msg'][0], 'icon' => 'error']);

            return;
        }
        if ($this->photo) {
            $directory = 'public/assets/images/pets';
            if (! Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            $filename = uniqid().'.'.$this->photo->getClientOriginalExtension();
            $path = $this->photo->storeAs($directory, $filename);
            $this->petInfo['image'] = 'assets/images/pets/'.$filename;
        }

        if (app()->make(PetService::class)->update($this->petInfo, $this->petInfo['id'])) {

            $this->dispatch('sweetAlert', ['msg' => 'Pet cadastrado com sucesso!', 'icon' => 'success']);

            return redirect(request()->header('Referer'));
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao Editar o pet!', 'icon' => 'success']);
    }
}
