<?php

namespace App\Livewire\Admin\Pets\Components;

use App\Services\CustomerService;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePet extends Component
{
    use WithFileUploads;

    #[Rule('image|max:1024')] // 1MB Max
    public $photo;

    public $customers = [];

    public function render()
    {
        return view('livewire.admin.pets.components.create-pet');
    }

    public function mount()
    {
        $this->customers = app()->make(CustomerService::class)->getAllCustomers();
    }
}
