<?php

namespace App\Livewire\Admin\MiscellaneousRecords\Components;

use Livewire\Component;

class BreedsTable extends Component
{
    public $searchTermsBreed;
    public $breeds = [];
    public function render()
    {
        return view('livewire.admin.miscellaneous-records.components.breeds-table');
    }

    public function createBreed()
    {

    }
}
