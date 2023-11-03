<?php

namespace App\Livewire\Admin\BathAndGrooming\Plan;

use App\Services\BathAndGroomingPlanService;
use App\Services\SpecieService;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $searchTerms;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 15;

    public $form = [];

    public $planId;


    public function render()
    {
        return view(
            'livewire.admin.bath-and-grooming.plan.index',
            [
                'plans' => app()->make(BathAndGroomingPlanService::class)->getBathAndGroomingPlansToTable($this->searchTerms, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit),
                'species' => app()->make(SpecieService::class)->all(),

            ]
        );
    }


    public function goToIndex()
    {
        return redirect()->route('bathAndGrooming.index');
    }

    public function createOrEditPlan()
    {
        $this->form['price'] = $this->convertToDecimal($this->form['price']);
        $this->form['max_weight'] = $this->convertToDecimal($this->form['max_weight']);

        if ($this->planId) {

            if (app()->make(BathAndGroomingPlanService::class)->update($this->form, $this->planId)) {
                $this->dispatch('sweetAlert', ['msg' => 'Registro salvo com sucesso', 'icon' => 'success']);
                $this->addPlan();
                return;
            }
            $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar deletar o plano! Tente novamente.', 'icon' => 'error']);
            return;
        }

        if (app()->make(BathAndGroomingPlanService::class)->create($this->form)) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro salvo com sucesso', 'icon' => 'success']);
            $this->addPlan();
            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar deletar o plano! Tente novamente.', 'icon' => 'error']);
    }

    public function addPlan()
    {
        $this->form = [];
        $this->dispatch('addPlan');
    }

    public function editPlan(int $id)
    {
        $plan = app()->make(BathAndGroomingPlanService::class)->find($id)->toArray();
        if ($plan) {
            $this->planId = $id;
            $this->form = $plan;
            $this->dispatch('editPlan', $plan);
            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar recuperar o plano! Tente novamente,', 'icon' => 'error']);
    }

    public function destroyPlan(int $id)
    {
        if (app()->make(BathAndGroomingPlanService::class)->destroy($id)) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro deletado com sucesso', 'icon' => 'success']);
            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar deletar o plano! Tente novamente.', 'icon' => 'error']);
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
}
