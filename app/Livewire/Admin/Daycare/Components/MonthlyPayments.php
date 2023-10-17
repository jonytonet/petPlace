<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Models\ServiceReference;
use App\Services\DaycareDailyCreditService;
use App\Services\DaycareEnrollmentService;
use App\Services\DaycareMonthlyPaymentService;
use App\Services\PaymentMethodService;
use App\Services\ServiceFinancialService;
use App\Services\ServiceReferenceService;
use App\Services\ServiceTypeService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class MonthlyPayments extends Component
{
    public $serviceTypeId;

    public $serviceType;

    public $referenceMonth;

    public $paymentMethodId;

    public $paymentMethod;

    public $serviceReferenceId;

    public $serviceValue = 0;

    public $discount = 0;

    public $netTotal = 0;

    public $payDay = 15;

    public $daycareEnrollmentId;

    public $daycareEnrollment;

    public $fee = 0;

    public function mount()
    {
        if ($this->daycareEnrollmentId) {
            $this->getData($this->daycareEnrollmentId);
        }
        $this->serviceType = app()->make(ServiceTypeService::class)->all();
        $this->paymentMethod = app()->make(PaymentMethodService::class)->all();
    }

    public function render()
    {
        return view('livewire.admin.daycare.components.monthly-payments', ['serviceTypes' => $this->serviceType, 'paymentMethods' => $this->paymentMethod]);
    }

    public function getNetTotal()
    {
        $dateToPay = now();
        $fee = 0;
        $serviceValue = $this->convertToDecimal($this->serviceValue);
        $discount = $this->convertToDecimal($this->discount);

        if ($this->referenceMonth) {
            $day = $this->referenceMonth.'-'.$this->payDay;
            $dateToPay = Carbon::parse($day);
        }

        if ($dateToPay >= now()) {
            $delayDays = 0;
        } else {
            $delayDays = $dateToPay->diffInDays(now());
        }

        if ($delayDays > 0) {
            $fee = ($serviceValue * 0.01) + ($serviceValue * (0.02 / 30) * $delayDays);
            $this->fee = $fee;
        }

        $this->netTotal = $serviceValue + $fee - $discount;

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

    #[On('get-daycare-monthly-payment')]
    public function getData($data)
    {
        $enrollment = app()->make(DaycareEnrollmentService::class)->find($data);
        $this->daycareEnrollment = $enrollment;
        $this->daycareEnrollmentId = $enrollment->id;
        $this->payDay = Carbon::parse($enrollment->initial_date_plan)->day;
        $this->serviceValue = number_format($enrollment->daycarePlan->price ?? 0, 2, ',', '.');
        $this->getNetTotal();
        $this->dispatch('serviceValueInput', $this->serviceValue);
    }

    public function createPayment()
    {
        try {
            DB::beginTransaction();
            if (! $this->validePayment()) {
                return;
            }
            $reference = app()->make(ServiceReferenceService::class)->create(['reference' => ServiceReference::generateServiceReference()]);
            if (! $reference) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

                return;
            }

            $monthlyPayment = app()->make(DaycareMonthlyPaymentService::class)->create([
                'daycare_enrollment_id' => $this->daycareEnrollmentId,
                'service_reference_id' => $reference->id,
                'pay_day' => now()->format('Y-m-d'),
                'reference_month' => $this->referenceMonth,
            ]);

            if (! $monthlyPayment) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

                return;
            }
            $validity = Carbon::parse($this->daycareEnrollment->initial_date_plan);
            $validity->month = now()->month + 1;
            if (
                ! app()->make(DaycareDailyCreditService::class)->create(
                    [
                        'daycare_enrollment_id' => $this->daycareEnrollmentId,
                        'daily_credit' => $this->daycareEnrollment->daycarePlan->days,
                        'type' => 'enrollment',
                        'validity' => $validity,
                    ]
                )
            ) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);
            }

            if (
                ! app()->make(ServiceFinancialService::class)->create([
                    'service_reference_id' => $reference->id,
                    'service_type_id' => $this->serviceTypeId,
                    'service_value' => $this->convertToDecimal($this->serviceValue),
                    'payment_method_id' => $this->paymentMethodId,
                    'discount' => $this->convertToDecimal($this->discount),
                    'net_total' => $this->convertToDecimal($this->netTotal),
                ])
            ) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

            }
            DB::commit();
            $this->dispatch('sweetAlert', ['msg' => 'Pagamento gravado com sucesso!', 'icon' => 'success']);

            return redirect(request()->header('Referer'));
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

            return;
        }

    }

    public function validePayment()
    {
        if (! $this->referenceMonth) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina o Mês de Referência!', 'icon' => 'error']);

            return false;
        }
        if (! $this->serviceTypeId) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina o Serviço!', 'icon' => 'error']);

            return false;
        }
        if (! $this->serviceValue) {
            $this->dispatch('sweetAlert', ['msg' => 'Valor não definido!', 'icon' => 'error']);

            return false;
        }
        if (! $this->paymentMethodId) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina o método de pagamento!', 'icon' => 'error']);

            return false;
        }

        return true;
    }
}
