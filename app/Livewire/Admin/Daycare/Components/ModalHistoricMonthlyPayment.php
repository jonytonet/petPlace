<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareMonthlyPaymentService;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ModalHistoricMonthlyPayment extends Component
{
    use WithPagination;

    public $pet;

    #[Url]
    public $petId;

    public function render()
    {
        $payments = app()->make(DaycareMonthlyPaymentService::class)->getDataDaycareMonthlyPaymentByPetId($this->petId);

        return view('livewire.admin.daycare.components.modal-historic-monthly-payment', compact('payments'));
    }

    public function goToIndex()
    {
        return redirect()->route('daycare.enrollment');
    }

    public function monthlyPayment($id)
    {
        $this->dispatch('get-daycare-monthly-payment', $id);
    }
}
