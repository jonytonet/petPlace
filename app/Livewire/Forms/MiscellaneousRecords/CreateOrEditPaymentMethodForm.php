<?php

namespace App\Livewire\Forms\MiscellaneousRecords;

use App\Services\PaymentMethodService;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateOrEditPaymentMethodForm extends Form
{
    public $paymentMethodId;

    #[Rule(['required'], onUpdate: false, message: 'Campo obrigatório!')]
    public $name;

    public $description;

    public $fee;

    public $receiptDeadline;

    public function save()
    {

        $this->validate();
        if ($this->paymentMethodId) {
            if (
                app()->make(PaymentMethodService::class)->update(
                    [
                        'name' => $this->name,
                        'description' => $this->description,
                        'fee' => $this->convertToDecimal($this->fee),
                        'receipt_deadline' => $this->receiptDeadline,
                    ],
                    $this->paymentMethodId
                )
            ) {
                $this->clearProprieties();

                return true;
            }

            return false;
        } else {
            if (
                app()->make(PaymentMethodService::class)->create(
                    [
                        'name' => $this->name,
                        'description' => $this->description,
                        'fee' => $this->convertToDecimal($this->fee),
                        'receipt_deadline' => $this->receiptDeadline,
                    ]
                )
            ) {
                $this->clearProprieties();

                return true;
            }

            return false;
        }

    }

    public function clearProprieties()
    {
        $this->name = null;
        $this->description = null;
        $this->fee = null;
        $this->receiptDeadline = null;
        $this->paymentMethodId = null;
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
