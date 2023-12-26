<?php

namespace App\Livewire\Admin\BathAndGrooming\Control;

use App\Models\BathAndGroomingBooking;
use App\Services\BathAndGroomingBookingService;
use App\Services\BathAndGroomingControlService;
use App\Services\ServiceFinancialService;
use App\Services\ServiceReferenceService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TableBooking extends Component
{
    use WithPagination;

    public $searchTerms;

    public $filters = [];

    public $targetDate = null;

    public $petFilter = [];

    public $tutorFilter = [];

    public $filtersFormatted = [];

    public $limit = 15;

    public $destroyId;

    public function mount()
    {
        $this->filtersFormatted = [['bath_date', Carbon::today()->format('Y-m-d')]];
        $this->targetDate = Carbon::today()->format('d/m/Y');
    }

    public function render()
    {
        return view(
            'livewire.admin.bath-and-grooming.control.table-booking',
            [
                'bookings' => app()->make(BathAndGroomingBookingService::class)->getBathAndGroomingBookingsToTable($this->searchTerms, $this->filtersFormatted, $this->limit, $this->tutorFilter, $this->petFilter),
            ]
        );
    }

    public function goToShow($id)
    {
        $this->dispatch('showBookingBath', $id);
    }

    public function destroy()
    {

        $booking = app()->make(BathAndGroomingBookingService::class)->find($this->destroyId);

        if ($booking->bath_and_grooming_control_id) {
            $this->destroyBathWithPlan($booking);
        } else {
            $this->destroyBathSingle($booking);
        }

    }

    public function destroyBathWithPlan(BathAndGroomingBooking $booking)
    {
        try {
            DB::beginTransaction();

            if (
                ! app()->make(BathAndGroomingControlService::class)->update([
                    'baths_number_used' => $booking->bathAndGroomingControl->baths_number_used - 1,
                    'updated_at' => now(),
                ], $booking->bath_and_grooming_control_id)
            ) {
                DB::rollBack();
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

                return;
            }

            if (! app()->make(BathAndGroomingBookingService::class)->destroy($booking->id)) {
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao excluir o banho!', 'icon' => 'error']);
                DB::rollBack();

                return;
            }
            DB::commit();
            $this->dispatch('sweetAlert', ['msg' => 'Banho excluído com sucesso!', 'icon' => 'success']);
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

            return;
        }
    }

    public function destroyBathSingle(BathAndGroomingBooking $booking)
    {

        try {
            DB::beginTransaction();
            $referenceId = $booking->service_reference_id;

            if (! app()->make(BathAndGroomingBookingService::class)->destroy($booking->id)) {

                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao excluir o banho!', 'icon' => 'error']);
                DB::rollBack();

                return;
            }
            if (! app()->make(ServiceFinancialService::class)->destroyByServiceReference($referenceId)) {
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao excluir o banho!', 'icon' => 'error']);
                DB::rollBack();

                return;
            }
            if (! app()->make(ServiceReferenceService::class)->destroy($referenceId)) {
                $this->dispatch('sweetAlert', ['msg' => 'Houve um erro ao excluir o banho!', 'icon' => 'error']);
                DB::rollBack();

                return;
            }

            DB::commit();
            $this->dispatch('sweetAlert', ['msg' => 'Banho excluído com sucesso!', 'icon' => 'success']);
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->dispatch('sweetAlert', ['msg' => 'Houve um erro! Tente novamente.', 'icon' => 'error']);

            return;
        }
    }

    public function clearFilters()
    {
        $this->tutorFilter = [];
        $this->petFilter = [];
        $this->filtersFormatted = [['bath_date', Carbon::today()->format('Y-m-d')]];
        $this->targetDate = Carbon::today()->format('d/m/Y');
    }

    public function setDestroyId($id)
    {
        $this->destroyId = $id;
    }

    public function getFilters()
    {

        $this->filtersFormatted = [];
        foreach ($this->filters as $key => $filter) {
            if (! isset($filter['filter'])) {
                $filter['filter'] = '=';
            }
            if ($filter['filter'] == 'LIKE') {
                $filter['term'] = '%'.$filter['term'].'%';
            }
            if ($key == 'user') {
                $this->tutorFilter = [['name', $filter['filter'], $filter['term']]];
            }
            if ($key == 'pet') {
                $this->petFilter = [['name', $filter['filter'], $filter['term']]];
            }

            if ($key == 'start') {
                $this->targetDate = Carbon::parse($filter['term'])->format('d/m/Y');
                $this->filtersFormatted[] = ['bath_date', $filter['filter'], $filter['term']];

            }
            if ($key == 'end') {
                $this->targetDate .= ' - '.Carbon::parse($filter['term'])->format('d/m/Y');
                $this->filtersFormatted[] = ['bath_date', $filter['filter'], $filter['term']];
            }
        }
    }
}
