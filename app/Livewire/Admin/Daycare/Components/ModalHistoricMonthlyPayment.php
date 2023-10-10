<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareMonthlyPaymentService;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

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
        return redirect()->route('daycare.index');
    }

    public function monthlyPayment($id)
    {
        $this->dispatch('get-daycare-monthly-payment', $id);
    }


}
