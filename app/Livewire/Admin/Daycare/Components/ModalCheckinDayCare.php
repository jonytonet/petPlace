<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Models\ServiceReference;
use App\Services\DaycareBookingService;
use App\Services\DaycareDailyCreditService;
use App\Services\DaycareEnrollmentService;
use App\Services\PetService;
use App\Services\ServiceFinancialService;
use App\Services\ServiceReferenceService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class ModalCheckinDayCare extends Component
{
    public $pets = [];

    public $enrollments = [];

    public $checkInType;

    public $enrollmentId;

    public $petId;

    public $period;

    public $value = 0.00;

    public function render()
    {
        return view('livewire.admin.daycare.components.modal-checkin-day-care');
    }

    public function mount()
    {
        $this->enrollments = app()->make(DaycareEnrollmentService::class)->getActiveEnrollments();
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
            $daycareDailyCredit = app()->make(DaycareDailyCreditService::class)->getValidDailyDaycareCredit($this->enrollmentId);
            if (! $daycareDailyCredit || $daycareDailyCredit->daily_credit <= 0) {
                $this->dispatch('sweetAlert', ['msg' => 'Pet já excedeu os dias do pacote! Renove o pacote ou utilize diária avulsa.', 'icon' => 'error']);

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
                    'period' => $enrollment->daycarePlan->session_type,
                    'is_single_daily' => false,
                ])
            ) {
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao realizar o CheckIn!', 'icon' => 'error']);
                $this->clearData();

                return;
            }

            $daycareDailyCredit->daily_credit -= 1;
            $daycareDailyCredit->type = 'checkin';
            $balanceDailyCredit = $daycareDailyCredit->toArray();
            unset($balanceDailyCredit['id']);
            unset($balanceDailyCredit['created_at']);
            unset($balanceDailyCredit['created_at']);
            app()->make(DaycareDailyCreditService::class)->create($balanceDailyCredit);

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
            $reference = app()->make(ServiceReferenceService::class)->create(['reference' => ServiceReference::generateServiceReference()]);
            if (! $reference) {

                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

                return;
            }

            $pet = app()->make(PetService::class)->find($this->petId);

            if (
                ! app()->make(ServiceFinancialService::class)->create([
                    'service_reference_id' => $reference->id,
                    'service_type_id' => 1,
                    'user_id' => $pet->user_id,
                    'service_value' => $this->convertToDecimal($this->value),
                    'is_paid' => false,
                ])
            ) {

                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

            }
            if (
                ! app()->make(DaycareBookingService::class)->create([
                    'pet_id' => $this->petId,
                    'date' => Carbon::now()->format('Y-m-d'),
                    'entry_time' => Carbon::now('America/Sao_Paulo')->format('H:i:s'),
                    'is_single_daily' => true,
                    'period' => $this->period,

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

    private function convertToDecimal(string $value): float
    {
        $cleanedValue = preg_replace('/[^0-9,.]/', '', $value);
        if (strpos($cleanedValue, ',') !== false && strpos($cleanedValue, '.') !== false) {
            $formattedValue = str_replace(['.'], '.', $cleanedValue);
            $formattedValue = str_replace(',', '.', $formattedValue);
        } else {
            $formattedValue = str_replace(['.', ','], ['.', '.'], $cleanedValue);
        }
        if (Str::contains($formattedValue, '.')) {
            $arrayValue = explode('.', $formattedValue);
            $endElement = end($arrayValue);
            array_pop($arrayValue);
            $formattedValue = implode('', $arrayValue).'.'.$endElement;
        }

        return floatval($formattedValue);
    }
}
