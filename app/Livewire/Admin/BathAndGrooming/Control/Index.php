<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Models\ServiceReference;
use App\Services\BathAndGroomingControlService;
use App\Services\PetService;
use App\Services\ServiceFinancialService;
use App\Services\ServiceReferenceService;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Index extends Component
{
    public $petId;

    public $type;

    public $bathPlan;

    public $date;

    public function render()
    {
        return view('livewire.admin.bath-and-grooming.control.index',
            [
                'pets' => app()->make(PetService::class)->all(),
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
            return;
        }

        if (!$this->petId) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina um pet!', 'icon' => 'error']);
            $this->dispatch('typeClear');
            return;
        }
        if (!$this->type) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina o tipo!', 'icon' => 'error']);
            return;
        }

        $this->bathPlan = app()->make(BathAndGroomingControlService::class)->getPlanControlByPetId($this->petId);

        if (!$this->bathPlan) {

            $this->dispatch('sweetAlert', ['msg' => 'O pet não possui pacote com saldo de banho!', 'icon' => 'error']);
            $this->dispatch('typeClear');
            return;
        }

    }

    public function booking()
    {

        if (!$this->petId) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina um pet!', 'icon' => 'error']);
            return;
        }
        if (!$this->type) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina o tipo!', 'icon' => 'error']);
            return;
        }

        if ($this->type == 'single') {




            return;
        }


        if (!$this->bathPlan) {
            $this->dispatch('sweetAlert', ['msg' => 'O pet não possui pacote com saldo de banho!', 'icon' => 'error']);
            $this->dispatch('typeClear');
            return;
        }


    }


    public function makeSingleBooking(){

    }

    public function makeBookingWithBathPlan(){
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
                    'service_value' => $this->convertToDecimal(),
                    'is_paid' => false,
                ])
            ) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

            }

            DB::commit();
            $this->dispatch('sweetAlert', ['msg' => 'Pacote cadastrado com sucesso!', 'icon' => 'success']);
            $this->dispatch('clearPetPlan');

            return redirect(request()->header('Referer'));
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

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
