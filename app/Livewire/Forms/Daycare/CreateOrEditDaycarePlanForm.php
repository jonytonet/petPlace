<?php

namespace App\Livewire\Forms\Daycare;

use App\Services\DaycarePlanService;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreateOrEditDaycarePlanForm extends Form
{
    public $planId;

    #[Rule('required', onUpdate: false, message: 'Campo obrigatório!')]
    public $name;

    public $description;

    public $days;

    public $sessionType;

    public $price;

    public function save()
    {
        $this->validate();
        if ($this->planId) {
            if (
                app()->make(DaycarePlanService::class)->update(
                    [
                        'name' => $this->name,
                        'description' => $this->description,
                        'days' => $this->days,
                        'session_type' => $this->sessionType,
                        'price' => $this->convertToDecimal($this->price),
                    ],
                    $this->planId
                )
            ) {
                $this->clearProprieties();

                return true;
            }

            return false;
        } else {
            if (
                app()->make(DaycarePlanService::class)->create(
                    [
                        'name' => $this->name,
                        'description' => $this->description,
                        'days' => $this->days,
                        'session_type' => $this->sessionType,
                        'price' => $this->convertToDecimal($this->price),
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
        $this->planId = null;
        $this->name = null;
        $this->description = null;
        $this->days = null;
        $this->sessionType = null;
        $this->price = null;

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
