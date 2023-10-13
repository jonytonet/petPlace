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
        $booking->exit_time = now('America/Sao_Paulo')->format('H:i:s');
        if ($booking->isLate()) {
            $booking->extra_time = $booking->getDelayInMinutes();
        }
        if ($booking->update()) {
            $this->dispatch('sweetAlert', ['msg' => 'CheckOut realizado com sucesso!', 'icon' => 'success']);

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao realizar o CheckOut!', 'icon' => 'error']);
    }

    public function checkLunchTime($id)
    {
        if (app()->make(DaycareBookingService::class)->update(['lunch_time' => now('America/Sao_Paulo')->format('H:i:s')], $id)) {
            $this->dispatch('sweetAlert', ['msg' => 'Almoço marcado com sucesso!', 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao marcar o almoço!', 'icon' => 'error']);
    }
}
