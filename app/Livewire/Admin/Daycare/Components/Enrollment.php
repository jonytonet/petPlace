<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareEnrollmentService;
use App\Services\DaycarePlanService;
use App\Services\PetService;
use Livewire\Component;
use Livewire\WithPagination;

class Enrollment extends Component
{
    use WithPagination;

    public $searchTerms;

    public $filters = [];

    public $filtersFormatted = [];

    public $orderBy = 'id';

    public $orderDirection = 'ASC';

    public $limit = 5;

    public $petId;

    public $planId;

    public $start;

    public function render()
    {
        return view(
            'livewire.admin.daycare.components.enrollment',
            [
                'enrollments' => app()->make(DaycareEnrollmentService::class)->getDaycareEnrollmentsToTable($this->searchTerms, $this->filtersFormatted, $this->orderBy, $this->orderDirection, $this->limit),
                'pets' => app()->make(PetService::class)->all(),
                'plans' => app()->make(DaycarePlanService::class)->all(),
            ]
        );
    }

    public function goToIndex()
    {
        return redirect()->route('daycare.index');
    }

    public function createOrEditEnrollment(): void
    {
        dd(
            $this->petId,
            $this->planId,
            $this->start
        );

    }

    public function editEnrollment(int $id): void
    {

        $Enrollment = app()->make(DaycareEnrollmentService::class)->find($id);
        if ($Enrollment) {

            return;
        }

        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar recuperar a EEnrollment! Tente novamente.', 'icon' => 'error']);
    }

    public function destroyEnrollment(int $id): void
    {
        if (app()->make(DaycareEnrollmentService::class)->destroy($id)) {
            $this->dispatch('sweetAlert', ['msg' => 'Registro deletado com sucesso', 'icon' => 'success']);

            return;
        }
        $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao tentar deletar a EEnrollment! Tente novamente.', 'icon' => 'error']);

    }

    public function addEnrollment(): void
    {

    }
}
