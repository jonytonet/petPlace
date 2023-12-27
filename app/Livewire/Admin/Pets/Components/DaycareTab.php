<?php

namespace App\Livewire\Admin\Pets\Components;

use App\Services\DaycareBookingService;
use App\Services\DaycareEnrollmentService;
use Livewire\Component;

class DaycareTab extends Component
{
    public $pet;

    public function render()
    {
        return view(
            'livewire.admin.pets.components.daycare-tab',
            [
                'enrollments' => app()->make(DaycareEnrollmentService::class)->getAllEnrollmentsByPet($this->pet->id),
                'enrollmentActive' => app()->make(DaycareEnrollmentService::class)->getActiveEnrollmentByPet($this->pet->id),
                'bookings' => app()->make(DaycareBookingService::class)->getAllCheckingByPet($this->pet->id),
            ]
        );
    }
}
