<?php

namespace App\Livewire\Admin\Pets\Components;

use App\Services\CustomerService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

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
