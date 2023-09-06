<?php

namespace App\Livewire\Admin\MiscellaneousRecords\Components;

use Livewire\Component;

class SpeciesTable extends Component
{

    public $searchTerms;
    public $species = [];
    public function render()
    {
        return view('livewire.admin.miscellaneous-records.components.species-table');
    }

    public function createSpecie()
    {

    }
}
