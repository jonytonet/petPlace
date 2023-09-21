<?php

namespace App\Livewire\Admin\MiscellaneousRecords\Components;

use App\Livewire\Forms\MiscellaneousRecords\CreateOrEditPaymentMethodForm;
use App\Services\PaymentMethodService;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentMethodTable extends Component
{
    use WithPagination;

    public $searchTermsPaymentMethod;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 5;

    public CreateOrEditPaymentMethodForm $formPaymentMethod;

    public function render()
    {
        return view(
            'livewire.admin.miscellaneous-records.components.payment-method-table',
            ['paymentMethods' => app()->make(PaymentMethodService::class)->getPaymentMethodsToTable($this->searchTermsPaymentMethod, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit)]

        );
    }

    public function createOrEditPaymentMethod(): void
    {
        if ($this->formPaymentMethod->save()) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro salvo com sucesso', 'icon' => 'success']);

            return /* redirect(request()->header('Referer')) */;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar gravar o método! Tente novamente.', 'icon' => 'error']);

    }

    public function editPaymentMethod(int $id): void
    {

        $paymentMethod = app()->make(PaymentMethodService::class)->find($id);
        if ($paymentMethod) {
            $this->formPaymentMethod->paymentMethodId = $id;
            $this->formPaymentMethod->name = $paymentMethod->name;
            $this->formPaymentMethod->description = $paymentMethod->description;
            $this->dispatch('editPaymentMethod', $paymentMethod);

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar recuperar a método! Tente novamente.', 'icon' => 'error']);
    }

    public function destroyPaymentMethod(int $id): void
    {
        if (app()->make(PaymentMethodService::class)->destroy($id)) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro deletado com sucesso', 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar deletar a método! Tente novamente.', 'icon' => 'error']);

    }

    public function addPaymentMethod(): void
    {

        $this->formPaymentMethod->clearProprieties();
        $this->dispatch('addPaymentMethod');
    }
}
