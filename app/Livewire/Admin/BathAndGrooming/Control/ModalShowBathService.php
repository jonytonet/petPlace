<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Services\BathAndGroomingBookingService;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalShowBathService extends Component
{
    public $petName;

    public $urlImage;

    public $tutor;

    public $date;

    public $time;

    public $bathTypes = [];

    public $bathComplements = [];

    public $booking;

    public $extraServices;

    public $notes;

    public function render()
    {

        return view('livewire.admin.bath-and-grooming.control.modal-show-bath-service');
    }

    #[On('showBookingBath')]
    public function getBath(?int $id)
    {

        if ($id) {
            $this->booking = app()->make(BathAndGroomingBookingService::class)->find($id);
            $this->petName = $this->booking->pet->name;
            $this->urlImage = $this->booking->pet->image;
            $this->date = Carbon::parse($this->booking->bath_date)->format('d/m/Y');
            $this->time = Carbon::parse($this->booking->bath_time)->format('HH:ii');
            $this->tutor = $this->booking->pet->user->name;
            $this->bathTypes = json_decode($this->booking->bath_type);
            $this->bathComplements = json_decode($this->booking->bath_complement);
            $this->extraServices = $this->booking->extra_services;
            $this->notes = $this->booking->notes;
        }
    }
}
