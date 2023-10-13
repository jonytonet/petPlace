<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareBookingService;
use Livewire\Component;

class Booking extends Component
{
    public function render()
    {

        return view('livewire.admin.daycare.components.booking', [
            'daycarePets' => app()->make(DaycareBookingService::class)->getCheckInToday(),
        ]);
    }

    public function checkOut($id)
    {
        $booking = app()->make(DaycareBookingService::class)->find($id);
        $booking->exit_time = now();
        if ($booking->isLate()) {
            $booking->extra_time = $booking->getDelayInMinutes();
        }
        if ($booking->update()) {
            $this->dispatch('sweetAlert', ['msg' => 'CheckOut realizado com sucesso!', 'icon' => 'success']);

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao realizar o CheckOut!', 'icon' => 'error']);
    }
}
