<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareBookingService;
use App\Services\DaycareEnrollmentService;
use App\Services\PetService;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ModalCheckinDayCare extends Component
{
    public $pets = [];

    public $enrollments = [];

    public $checkInType;

    public $enrollmentId;

    public $petId;

    public function render()
    {
        return view('livewire.admin.daycare.components.modal-checkin-day-care');
    }

    public function mount()
    {
        $this->enrollments = app()->make(DaycareEnrollmentService::class)->getActiveEnrollment();
        $this->pets = app()->make(PetService::class)->all();
    }

    public function addCheckIn()
    {
        if (! $this->checkInType) {
            $this->dispatch('sweetAlert', ['msg' => 'Selecione um tipo de CheckIn!', 'icon' => 'error']);

            return;

        }

        if ($this->checkInType == 'M') {
            if (! $this->enrollmentId) {
                $this->dispatch('sweetAlert', ['msg' => 'Defina um pet!', 'icon' => 'error']);

                return;
            }
            $enrollment = app()->make(DaycareEnrollmentService::class)->find($this->enrollmentId);
            if (app()->make(DaycareBookingService::class)->isBooking($enrollment->pet_id)) {
                $this->dispatch('sweetAlert', ['msg' => 'O pet possuí um check in em aberto!', 'icon' => 'error']);
                $this->clearData();

                return;
            }
            if (
                ! app()->make(DaycareBookingService::class)->create([
                    'pet_id' => $enrollment->pet_id,
                    'daycare_enrollment_id' => $this->enrollmentId,
                    'date' => Carbon::now()->format('Y-m-d'),
                    'entry_time' => Carbon::now('America/Sao_Paulo')->format('H:i:s'),
                    'is_single_daily' => false,
                ])
            ) {
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao realizar o CheckIn!', 'icon' => 'error']);
                $this->clearData();

                return;
            }

            $this->dispatch('sweetAlert', ['msg' => 'CheckIn realizado com sucesso!', 'icon' => 'success']);
            $this->clearData();

            return redirect(request()->header('Referer'));
        }

        if ($this->checkInType == 'A') {
            if (! $this->petId) {
                $this->dispatch('sweetAlert', ['msg' => 'Defina um pet!', 'icon' => 'error']);

                return;
            }
            if (app()->make(DaycareBookingService::class)->isBooking($this->petId)) {
                $this->dispatch('sweetAlert', ['msg' => 'O pet possuí um check in em aberto!', 'icon' => 'error']);
                $this->clearData();

                return;
            }
            if (
                ! app()->make(DaycareBookingService::class)->create([
                    'pet_id' => $this->petId,
                    'date' => Carbon::now()->format('Y-m-d'),
                    'entry_time' => Carbon::now('America/Sao_Paulo')->format('H:i:s'),
                    'is_single_daily' => true,

                ])
            ) {
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao realizar o CheckIn!', 'icon' => 'error']);
                $this->clearData();

                return;
            }

            $this->dispatch('sweetAlert', ['msg' => 'CheckIn realizado com sucesso!', 'icon' => 'success']);
            $this->clearData();

            return redirect(request()->header('Referer'));

        }

    }

    public function clearData()
    {
        $this->checkInType = null;
        $this->petId = null;
        $this->enrollmentId = null;
    }
}
