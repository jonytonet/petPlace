<?php

namespace App\Livewire\Admin\Components;

use App\Services\PaymentMethodService;
use App\Services\ServiceTypeService;
use App\Services\UserService;
use Livewire\Component;
use Livewire\Attributes\On;

class PaymentForm extends Component
{
    public $serviceReference;
    public $serviceTypeId;
    public $serviceValue;
    public $paymentMethodId;
    public $discount;
    public $additionalExpenses;
    public $commissionValue;
    public $commissionBy;
    public $netTotal;
    public $valueDisabled = false;

    public function render()
    {
        return view(
            'livewire.admin.components.payment-form',
            [
                'serviceTypes' => app()->make(ServiceTypeService::class)->all(),
                'paymentMethods' => app()->make(PaymentMethodService::class)->all(),
                'users' => app()->make(UserService::class)->getUsers()
            ]
        );
    }

    #[On('payment-form')]
    public function getData($data)
    {
        dd($data);
        $this->serviceReference = $data['serviceReference'] ?? null;
        $this->serviceTypeId = $data['serviceTypeId'] ?? null;
        $this->serviceValue = $data['serviceValue'] ?? null;
        $this->paymentMethodId = $data['paymentMethodId'] ?? null;
        $this->discount = $data['discount'] ?? null;
        $this->additionalExpenses = $data['additionalExpenses'] ?? null;
        $this->commissionValue = $data['commissionValue'] ?? null;
        $this->commissionBy = $data['commissionBy'] ?? null;
    }
}
