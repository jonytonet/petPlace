<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Livewire\Forms\Daycare\CreateOrEditDaycarePlanForm;
use App\Services\DaycarePlanService;
use Livewire\Component;
use Livewire\WithPagination;

class Plans extends Component
{
    use WithPagination;

    public $searchTerms;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 15;

    public CreateOrEditDaycarePlanForm $formPlan;
    public function render()
    {
        return view(
            'livewire.admin.daycare.components.plans',
            ['plans' => app()->make(DaycarePlanService::class)->getDaycarePlansToTable($this->searchTerms, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit)]
        );
    }

    public function goToIndex()
    {
        return redirect()->route('daycare.index');
    }

    public function createOrEditPlan()
    {
        if ($this->formPlan->save()) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro salvo com sucesso', 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar gravar a Raça! Tente novamente.', 'icon' => 'error']);

    }

    public function editPlan(int $id)
    {
        $plan = app()->make(DaycarePlanService::class)->find($id);
        if ($plan) {
            $this->formPlan->planId = $id;
            $this->formPlan->name = $plan->name;
            $this->formPlan->description = $plan->description;
            $this->formPlan->days = $plan->days;
            $this->formPlan->sessionType = $plan->session_type;
            $this->formPlan->price = $plan->price;
            $this->dispatch('editPlan', $plan);

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar recuperar o plano! Tente novamente,', 'icon' => 'error']);
    }

    public function destroyPlan(int $id)
    {
        if (app()->make(DaycarePlanService::class)->destroy($id)) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro deletado com sucesso', 'icon' => 'success']);
            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar deletar o plano! Tente novamente.', 'icon' => 'error']);
    }

    public function addPlan()
    {
        $this->formPlan->clearProprieties();
        $this->dispatch('addPlan');
    }
}
