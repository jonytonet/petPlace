<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Services\BathAndGroomingBookingService;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalShowBathService extends Component
{
    public $date;

    public $time;

    public $bathType;

    public $booking;

    public function render()
    {
        $petName = '';
        $urlImage = '';
        $tutor = '';
        $bathType = [];
        if ($this->booking) {
            $petName = $this->booking->pet->name;
            $urlImage = $this->booking->pet->image;
            $tutor = $this->booking->pet->user->name;
            $bathType = json_decode($this->booking->bath_type);
        }

        return view('livewire.admin.bath-and-grooming.control.modal-show-bath-service', compact('petName', 'urlImage', 'tutor'));
    }

    #[On('showBookingBath')]
    public function getBath($id)
    {

        $this->booking = app()->make(BathAndGroomingBookingService::class)->find($id);

    }
}
