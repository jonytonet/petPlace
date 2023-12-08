<?php

namespace App\Livewire\Admin\MiscellaneousRecords\Components;

use App\Livewire\Forms\MiscellaneousRecords\CreateOrEditServiceTypeForm;
use App\Services\ServiceTypeService;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesTypeTable extends Component
{
    use WithPagination;

    public $searchTermsServiceType;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 5;

    public $species = [];

    public CreateOrEditServiceTypeForm $formServiceType;

    public function render()
    {
        return view(
            'livewire.admin.miscellaneous-records.components.services-type-table',
            ['serviceTypes' => app()->make(ServiceTypeService::class)->getServiceTypesToTable($this->searchTermsServiceType, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit)]

        );
    }

    public function createOrEditServiceType()
    {
        if ($this->formServiceType->save()) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro salvo com sucesso', 'icon' => 'success']);

            return /* redirect(request()->header('Referer')) */;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar gravar o Serviço! Tente novamente.', 'icon' => 'error']);

    }

    public function editServiceType(int $id)
    {
        $serviceType = app()->make(ServiceTypeService::class)->find($id);

        if ($serviceType) {
            $this->formServiceType->serviceTypeId = $id;
            $this->formServiceType->name = $serviceType->name;
            $this->formServiceType->description = $serviceType->description;
            $this->formServiceType->commission = $serviceType->commission;
            $this->formServiceType->commission_type = $serviceType->commission_type;
            $this->formServiceType->department = $serviceType->department;
            $this->dispatch('editServiceType', $serviceType);

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar recuperar o Serviço! Tente novamente,', 'icon' => 'error']);
    }

    public function destroyServiceType(int $id)
    {
        if (app()->make(ServiceTypeService::class)->destroy($id)) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro deletado com sucesso', 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar deletar a Raça! Tente novamente.', 'icon' => 'error']);
    }

    public function addServiceType()
    {
        $this->formServiceType->clearProprieties();

        $this->dispatch('addServiceType');
    }
}
