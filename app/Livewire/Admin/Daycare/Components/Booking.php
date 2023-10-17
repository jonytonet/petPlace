<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareBookingService;
use App\Services\DaycareDailyCreditService;
use Livewire\Component;

class Booking extends Component
{
    public $note;

    public $bookingId;

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
        if ($booking->extra_time > 15) {
            $daycareDailyCredit = app()->make(DaycareDailyCreditService::class)->getValidDailyDaycareCredit($booking->daycare_enrollment_id);
            $daycareDailyCredit->daily_credit -= 1;
            $daycareDailyCredit->type = 'checkout';
            $balanceDailyCredit = $daycareDailyCredit->toArray();
            unset($balanceDailyCredit['id']);
            unset($balanceDailyCredit['created_at']);
            unset($balanceDailyCredit['created_at']);
            $daycareDailyCredit = app()->make(DaycareDailyCreditService::class)->create([$balanceDailyCredit]);
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

    public function saveNote()
    {
        if (app()->make(DaycareBookingService::class)->update(['notes' => $this->note], $this->bookingId)) {
            $this->note = null;
            $this->bookingId = null;
            $this->dispatch('booking-notes-clear');
            $this->dispatch('sweetAlert', ['msg' => 'Observação salva com sucesso!', 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao salvar a observação!', 'icon' => 'error']);
    }

    public function getNote($id)
    {
        $booking = app()->make(DaycareBookingService::class)->find($id);
        $this->note = $booking->notes;
        $this->bookingId = $id;
        $this->dispatch('booking-notes', $booking->notes);
    }
}
