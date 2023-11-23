<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Models\ServiceReference;
use App\Services\BathAndGroomingControlService;
use App\Services\BathAndGroomingPlanService;
use App\Services\PetService;
use App\Services\ServiceFinancialService;
use App\Services\ServiceReferenceService;
use App\Services\ServiceTypeService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class ModalAddPlanToPet extends Component
{
    public $petId;

    public $planId;

    public $serviceTypeId;

    public function render()
    {
        return view(
            'livewire.admin.bath-and-grooming.control.modal-add-plan-to-pet',
            [
                'pets' => app()->make(PetService::class)->all(),
                'plans' => app()->make(BathAndGroomingPlanService::class)->all(),
                'serviceTypes' => app()->make(ServiceTypeService::class)->all(),
            ]
        );
    }

    public function createPetPlan()
    {
        if (! $this->petId || ! $this->planId || ! $this->serviceTypeId) {
            $this->dispatch('sweetAlert', ['msg' => 'Os campos são obrigatórios para cadastrar um pacote de banho ao um pet!.', 'icon' => 'error']);
        }

        try {
            DB::beginTransaction();

            $reference = app()->make(ServiceReferenceService::class)->create(['reference' => ServiceReference::generateServiceReference()]);
            if (! $reference) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

                return;
            }
            $plan = app()->make(BathAndGroomingPlanService::class)->find($this->planId);

            if (
                ! app()->make(BathAndGroomingControlService::class)->create([
                    'service_reference_id' => $reference->id,
                    'pet_id' => $this->petId,
                    'bath_and_grooming_plan_id' => $this->planId,
                    'value' => $plan->price,
                    'baths_number_plan' => $plan->baths_number,
                ])
            ) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

                return;
            }

            if (
                ! app()->make(ServiceFinancialService::class)->create([
                    'service_reference_id' => $reference->id,
                    'service_type_id' => $this->serviceTypeId,
                    'service_value' => $this->convertToDecimal($plan->price),
                    'payment_method_id' => $this->paymentMethodId,
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
