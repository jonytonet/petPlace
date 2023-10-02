<?php

namespace App\Livewire\Admin\Daycare\Components;

use App\Services\DaycareEnrollmentService;
use App\Services\DaycarePlanService;
use App\Services\PetService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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

    public $daycareEnrollmentId;

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

    public function createEnrollment()
    {
        if (! $this->petId) {
            $this->dispatch('sweetAlert', ['msg' => 'Selecione um Pet!', 'icon' => 'error']);

            return;
        }
        if (! $this->planId) {
            $this->dispatch('sweetAlert', ['msg' => 'Selecione um Plano!', 'icon' => 'error']);

            return;
        }
        if (! $this->start) {
            $this->dispatch('sweetAlert', ['msg' => 'Defina a data de inicio!', 'icon' => 'error']);

            return;
        }
        if (app()->make(DaycareEnrollmentService::class)->existActiveEnrollmentByPetId($this->petId)) {
            $this->dispatch('sweetAlert', ['msg' => 'Pet possui uma matricula ativa!', 'icon' => 'error']);

            return;
        }
        $enrollment = app()->make(DaycareEnrollmentService::class)->create(['pet_id' => $this->petId, 'daycare_plan_id' => $this->planId, 'initial_date_plan' => $this->start]);

        if ($enrollment) {
            $this->daycareEnrollmentId = $enrollment->id;
            $this->dispatch('get-daycare-monthly-payment', $enrollment->id);
            $pdf = Pdf::loadView(
                'pdfs.daycare-term',
                ['customer' => $enrollment->pet->user, 'pet' => $enrollment->pet, 'plan' => $enrollment->daycarePlan, 'enrollment' => $enrollment]
            );

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'CONTRATO_CRECHE_'.strtoupper($enrollment->pet->name).'_'.Carbon::parse(time())->format('dmY').'.pdf');
        }

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
        $this->petId = null;
        $this->planId = null;
        $this->start = null;
        $this->daycareEnrollmentId = null;

        $this->dispatch('add-enrollment');
    }

    public function monthlyPayment($id)
    {
        $this->dispatch('get-daycare-monthly-payment', $id);
    }
}
