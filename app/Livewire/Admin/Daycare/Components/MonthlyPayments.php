<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareEnrollmentService;
use App\Services\PaymentMethodService;
use App\Services\ServiceTypeService;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\On;

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
            $day = $this->referenceMonth . '-' . $this->payDay;
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
            $formattedValue = implode('', $arrayValue) . '.' . $endElement;
        }

        return floatval($formattedValue);
    }

    #[On('get-daycare-monthly-payment')]
    public function getData($data)
    {
        $enrollment = app()->make(DaycareEnrollmentService::class)->find($data);
        $this->daycareEnrollment = $enrollment;
        $this->payDay = Carbon::parse($enrollment->initial_date_plan)->day;
        $this->serviceValue = number_format($enrollment->daycarePlan->price ?? 0, 2, ',', '.');
        $this->getNetTotal();
        $this->dispatch('serviceValueInput', $this->serviceValue);
    }
}
