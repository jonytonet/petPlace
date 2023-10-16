<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareBookingService;
use Livewire\Component;

class Historic extends Component
{
    public $searchTerms;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'DESC';

    public $limit = 25;

    public function render()
    {
        return view('livewire.admin.daycare.components.historic', ['historics' => app()->make(DaycareBookingService::class)->getDaycareBookingsToTable($this->searchTerms, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit)]);
    }

    public function goToIndex()
    {
        return redirect()->route('daycare.index');
    }
}
