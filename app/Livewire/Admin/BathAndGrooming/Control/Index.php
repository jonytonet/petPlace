<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Models\ServiceReference;
use App\Services\BathAndGroomingBookingService;
use App\Services\BathAndGroomingControlService;
use App\Services\PetService;
use App\Services\ServiceFinancialService;
use App\Services\ServiceReferenceService;
use App\Services\ServiceTypeService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    public $petId;

    public $type;

    public $bathPlan;

    public $date;

    public $singleValue = 0.00;

    public $serviceTypeId;

    public $bathType = [];

    public $bathComplement = [];

    public $extraServices;

    public $notes;

    public function render()
    {
        return view('livewire.admin.bath-and-grooming.control.index',
            [
                'pets' => app()->make(PetService::class)->all(),
                'serviceTypes' => app()->make(ServiceTypeService::class)->getBathAndGroomingServices(),
            ]
        );
    }

    public function goToPlans()
    {
        return redirect()->route('bathAndGrooming.plans');
    }

    public function checkBathPlan()
    {
        if ($this->type == 'single') {
            $this->dispatch('valueVisible');

            return;
        }
        $this->dispatch('valueInvisible');
        if (! $this->petId) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina um pet!', 'icon' => 'error']);
            $this->dispatch('typeClear');

            return;
        }
        if (! $this->type) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina o tipo!', 'icon' => 'error']);

            return;
        }

        $this->bathPlan = app()->make(BathAndGroomingControlService::class)->getPlanControlByPetId($this->petId);

        if (! $this->bathPlan) {

            $this->dispatch('sweetAlert', ['msg' => 'O pet não possui pacote com saldo de banho!', 'icon' => 'error']);
            $this->dispatch('typeClear');

            return;
        }

    }

    public function booking()
    {
        if (! $this->petId) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina um pet!', 'icon' => 'error']);

            return;
        }
        if (! $this->type) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina o tipo!', 'icon' => 'error']);

            return;
        }

        if ($this->type == 'single') {

            $this->makeSingleBooking();

        } else {
            $this->makeBookingWithBathPlan();
        }

    }

    public function makeSingleBooking()
    {
        if ($this->singleValue <= 0) {
            $this->dispatch('sweetAlert', ['msg' => 'Valor da diária deve ser maior que 0,01!', 'icon' => 'error']);

            return;
        }
        try {
            DB::beginTransaction();

            $reference = app()->make(ServiceReferenceService::class)->create(['reference' => ServiceReference::generateServiceReference()]);
            if (! $reference) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

                return;
            }
            if (
                ! app()->make(ServiceFinancialService::class)->create([
                    'service_reference_id' => $reference->id,
                    'service_type_id' => $this->serviceTypeId,
                    'service_value' => $this->convertToDecimal($this->singleValue),
                    'is_paid' => false,
                    'due_date' => Carbon::parse($this->date)->format('Y-m-d'),
                ])
            ) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

            }

            app()->make(BathAndGroomingBookingService::class)->create([
                'service_reference_id' => $reference->id,
                'pet_id' => $this->petId,
                'service_value' => $this->singleValue,
                'bath_date' => Carbon::parse($this->date)->format('Y-m-d'),
                'bath_time' => Carbon::parse($this->date)->format('H:i'),
                'bath_type' => json_encode($this->bathType),
                'bath_complement' => json_encode($this->bathComplement),
                'extra_services' => $this->extraServices,
                'notes' => $this->notes,

            ]);

            DB::commit();
            $this->dispatch('sweetAlert', ['msg' => 'Banho agendado com sucesso!', 'icon' => 'success']);

            return redirect(request()->header('Referer'));
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

            return;
        }

    }

    public function makeBookingWithBathPlan()
    {
        if (! $this->bathPlan) {
            $this->dispatch('sweetAlert', ['msg' => 'O pet não possui pacote com saldo de banho!', 'icon' => 'error']);
            $this->dispatch('typeClear');

            return;
        }
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
