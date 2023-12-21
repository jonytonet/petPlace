<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Services\BathAndGroomingBookingService;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TableBooking extends Component
{
    use WithPagination;

    public $searchTerms;

    public $filters = [];

    public $filtersFormatted = [];

    public $limit = 15;

    public function mount()
    {
        $this->filtersFormatted = [['bath_date', Carbon::today()->format('Y-m-d')]];
    }

    public function render()
    {
        return view('livewire.admin.bath-and-grooming.control.table-booking',
            ['bookings' => app()->make(BathAndGroomingBookingService::class)->getBathAndGroomingBookingsToTable($this->searchTerms, $this->filtersFormatted, $this->limit)]
        );
    }

    public function goToShow()
    {
    }

    public function destroy()
    {
    }
}
